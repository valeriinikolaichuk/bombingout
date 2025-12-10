<?php
    namespace App\Service\Main;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class LoginPageResolver implements PageResolverInterface
    {
        public function supports(Request $request, SessionInterface $session): bool
        {
            return
                !$session -> has('id') ||
                !$session -> has('status') ||
                !$session -> has('language');
        }

        public function resolve(Request $request, SessionInterface $session): PageResultDTO
        {
            return new PageResultDTO(template: 'login_page.html.twig');
        }
    }
?>