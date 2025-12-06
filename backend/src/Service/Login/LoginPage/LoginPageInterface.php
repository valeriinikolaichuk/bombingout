<?php
    namespace App\Service\Login\LoginPage;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    interface LoginPageInterface
    {
        public function supports(SessionInterface $session): bool;

        public function getLoginPage(): ?string;
    }
?>