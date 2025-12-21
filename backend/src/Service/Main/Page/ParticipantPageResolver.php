<?php
    namespace App\Service\Main\Page;

    use App\Service\Main\PageResolverInterface;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class ParticipantPageResolver implements PageResolverInterface
    {
        public function supports(Request $request, SessionInterface $session): bool
        {
            return 
                $session -> has('status') && 
                $session -> get('status') === 'participant';
        }

        public function resolve(Request $request, SessionInterface $session): array
        {
            return [
                'template' => 'dashboard_page.html.twig',
                'data' => [],
            ];
        }
    }
?>