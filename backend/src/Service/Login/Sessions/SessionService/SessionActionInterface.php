<?php
    namespace App\Service\Login\Sessions\SessionService;

//    use App\Service\AllSessions\SessionContextInterface;
use App\Service\Login\LoginDTO\LoginResultDTO;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    interface SessionActionInterface
    {
        public function supports(SessionInterface $session, LoginResultDTO $context): bool;

        public function apply(SessionInterface $session, LoginResultDTO $context): void;
    }
?>