<?php
    namespace App\Service\Login\Pages;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class LoginPageResolver implements LoginPageInterface
    {
        public function supports(SessionInterface $session): bool
        {
            return
                !$session->has('id') ||
                !$session->has('status') ||
                !$session->has('language');
        }

        public function getLoginPage(): ?string
        {
            return 'login_page.html.twig';
        }
    }
?>