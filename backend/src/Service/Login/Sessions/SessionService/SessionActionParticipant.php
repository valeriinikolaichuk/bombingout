<?php
    namespace App\Service\Login\Sessions\SessionService;
//use App\Service\AllSessions\SessionActionInterface;
//    use App\Service\AllSessions\SessionContextInterface;
    use App\Service\Login\LoginDTO\LoginResultDTO;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class SessionActionParticipant implements SessionActionInterface
    {
        public function supports(
            SessionInterface $session, 
            LoginResultDTO $context
        ): bool {
            return $context -> user -> getStatus() === 'participant';
        }

        public function apply(
            SessionInterface $session, 
            LoginResultDTO $context
            ): void {

            $session -> set('nominations_id', $context -> user -> getNominationsId());
        }
    }
?>