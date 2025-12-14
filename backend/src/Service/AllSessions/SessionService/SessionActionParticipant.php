<?php
    namespace App\Service\AllSessions\SessionService;

    use App\Service\AllSessions\SessionContextInterface;
    use App\Service\Login\LoginResultDTO;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class SessionActionParticipant implements SessionActionInterface
    {
        public function supports(SessionContextInterface $context): bool
        {
            return 
                $context instanceof LoginResultDTO && 
                $context -> createSession === 'login' &&
                $context -> user -> getStatus() === 'participant';
        }

        public function apply(
            SessionInterface $session, 
            SessionContextInterface $context
            ): void {

            $session -> set('nominations_id', $context -> user -> getNominationsId());
        }
    }
?>