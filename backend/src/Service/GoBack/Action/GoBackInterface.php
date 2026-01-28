<?php
    namespace App\Service\GoBack\Action;

    use App\Service\GoBack\GoBackDTO\GoBackContext;
    use App\Service\GoBack\GoBackDTO\ResultDTO;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    interface GoBackInterface
    {
        public function supports(GoBackContext $context, SessionInterface $session): bool;

        public function resolve(GoBackContext $context, SessionInterface $session, ResultDTO $dto): ResultDTO;
    }
?>