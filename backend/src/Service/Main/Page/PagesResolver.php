<?php
    namespace App\Service\Main\Page;

    use App\Service\Main\PageResolverInterface;
    use App\Enum\PageEnum;
    use App\Exception\NoPageResolverFoundException;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class PagesResolver implements PageResolverInterface {
        public function supports(Request $request, SessionInterface $session): bool 
        {
            return $session -> has('id') &&
                $session -> has('id_status') &&
                $session -> has('language') && 
                $session -> has('status') &&
                $session -> has('action');
        }

        public function resolve(Request $request, SessionInterface $session): array 
        {
            $page = PageEnum::tryFrom($session -> get('action'));

            if (!$page) {
                throw new NoPageResolverFoundException($session -> get('action'));
            }

            return [
                'template' => 'clients/'.$page->value.'_page.html.twig',
                'data' => [
                    'users_id'  => $session -> get('id'),
                    'id_status' => $session -> get('id_status'),
                    'lang'      => $session -> get('language'),
                    'status'    => $session -> get('status')
                ],
            ];
        }
    }
?>