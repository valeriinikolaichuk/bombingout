<?php
    namespace App\Service\GoBack\Action;

    use App\Service\GoBack\GoBackDTO\GoBackContext;
    use App\Service\GoBack\GoBackDTO\ResultDTO;
    use App\Service\Redirection\RequestActionFactory;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class DelSession implements GoBackInterface
    {
        public function __construct(
            private RequestActionFactory $factory
        ) {}

        public function supports(GoBackContext $context, SessionInterface $session): bool 
        {
            return $session ->has('action');
        }

        public function resolve(
            GoBackContext $context,
            SessionInterface $session,
            ResultDTO $dto
        ): ResultDTO {

            $session ->remove('action');

            return $dto;
        }
    }
?>