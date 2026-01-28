<?php
    namespace App\Service\GoBack\Action;

    use App\Service\GoBack\GoBackDTO\GoBackContext;
    use App\Service\GoBack\GoBackDTO\ResultDTO;
    use App\Service\Redirection\RequestActionFactory;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class SetSession implements GoBackInterface
    {
        public function __construct(
            private RequestActionFactory $factory
        ) {}

        public function supports(GoBackContext $context, SessionInterface $session): bool 
        {
            return $context -> page === 'redirect';
        }

        public function resolve(
            GoBackContext $context,
            SessionInterface $session,
            ResultDTO $dto
        ): ResultDTO {

            $session -> set('id', $context -> usersId);
            $session -> set('status', $context -> status);
            $session -> set('id_status', $context -> id_status);
            $session -> set('language', $context -> language);

            $data = array();

            $data['id_status'] = $context -> id_status;
            $action = $context -> page;

            $result = $this -> factory -> action($data, $action);

            if ($result == 'success'){
                $dto -> success = true;
                $dto -> message = 'go back to page';
            }

            return $dto;
        } 
    }
?>