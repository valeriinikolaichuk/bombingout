<?php
    namespace App\Service\Login\Strategy\Sessions;

    use App\Service\Login\LoginContext;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;
    use App\Entity\User;

    interface LoginSessionServiceInterface
    {
        public function supports(LoginContext $context): bool;

        public function setUserSession(
            SessionInterface $session,
            User $user,
            LoginContext $context
        ): void;
    }
?>