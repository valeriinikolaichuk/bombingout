<?php
    namespace App\Service\Main\Page;

    use App\Service\Main\PageResolverInterface;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class RedirectionPageResolver implements PageResolverInterface
    {
        public function supports(Request $request, SessionInterface $session): bool
        {
            return 
                $session -> has('status') && 
                $session -> get('status') !== 'participant' &&
                $session -> has('id') &&
                $session -> has('id_status') &&
                $session -> has('language') && 
                $session -> has('status') &&
                !$session -> has('action');
        }

        public function resolve(Request $request, SessionInterface $session): array
        {
            return [
                'template' => 'redirection_page.html.twig',
                'data' => [
                    'lang'      => $session -> get('language'),
                    'users_id'  => $session -> get('id'),
                    'id_status' => $session -> get('id_status'),
                    'status'    => $session -> get('status')
                ],
            ];
        }
    }
?>