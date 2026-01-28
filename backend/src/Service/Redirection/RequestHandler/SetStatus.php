<?php
    namespace App\Service\Redirection\RequestHandler;

    use App\Service\Redirection\RequestActionFactory;
    use App\Enum\PageEnum;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class SetStatus implements RequestHandlerInterface
    {
        public function __construct(
            private RequestActionFactory $factory
        ) {}

        public function supports(SessionInterface $session, string $action): bool
        {
            return PageEnum::tryFrom($action) !== null && 
                $session -> has('id_status');
        }

        public function execute(SessionInterface $session, string $action): string 
        {
            $session -> set('action', $action);

            $data = array();
            $data['id_status'] = $session -> get('id_status');

            $result = $this -> factory -> action($data, $action);

            return $result;
        }
    }
?>