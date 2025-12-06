<?php
    namespace App\Service\Login\StatusManager;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;
    use Symfony\Component\HttpFoundation\RedirectResponse;

    class ParticipantStatusHandler implements UserStatusHandlerInterface
    {
        public function supports(string $status): bool
        {
            return $status === 'participant';
        }

        public function handle(
            Request $request, 
            SessionInterface $session
            ): array {

            return [
                'template' => 'dashboard.html.twig',
                'data'     => []
            ];
        }
    }
?>