<?php
    namespace App\Service\Login\LoginPage;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    interface LoginPageResolverInterface
    {
        public function supports(SessionInterface $session): bool;

        public function getLoginPage(SessionInterface $session): ?string;
    }
?>