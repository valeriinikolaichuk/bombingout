<?php
    namespace App\Service\Login\StatusManager;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class DefaultStatusHandler implements UserStatusHandlerInterface
    {
        public function supports(string $status): bool
        {
            return true;
        }

        public function handle(Request $request, SessionInterface $session): array
        {
            return [
                'template' => 'redirection_page.html.twig',
                'data' => [
                    'lang'      => $session->get('language'),
                    'users_id'  => $session->get('id'),
                    'id_status' => $session->get('id_status'),
                ],
            ];
        }
    }
?>