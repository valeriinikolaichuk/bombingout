<?php
    namespace App\Service\Main;

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

        public function resolve(Request $request, SessionInterface $session): PageResultDTO
        {
            return new PageResultDTO(template: 'dashboard_page.html.twig');
        }
    }
?>