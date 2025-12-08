<?php
    namespace App\Service\Login\Pages;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    interface LoginPageInterface
    {
        public function supports(SessionInterface $session): bool;

        public function getLoginPage(): ?string;
    }
?>