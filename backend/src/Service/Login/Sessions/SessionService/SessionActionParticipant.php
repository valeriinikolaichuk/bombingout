<?php
    namespace App\Service\Login\Sessions\SessionService;

    use App\Service\Login\LoginDTO\LoginResultDTO;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class SessionActionParticipant implements SessionActionInterface
    {
        public function supports(
            SessionInterface $session, 
            LoginResultDTO $result
        ): bool {
            $user = $result -> context -> user;

            return $user -> getStatus() === 'participant';
        }

        public function apply(
            SessionInterface $session, 
            LoginResultDTO $result
            ): void {

            $user = $result -> context -> user;

            $session -> set('nominations_id', $user -> getNominationsId());
        }
    }
?>