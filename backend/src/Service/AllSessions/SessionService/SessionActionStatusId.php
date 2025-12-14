<?php
    namespace App\Service\AllSessions\SessionService;

    use App\Service\AllSessions\SessionContextInterface;
    use App\Service\Login\LoginResultDTO;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class SessionActionStatusId implements SessionActionInterface
    {
        public function supports(SessionContextInterface $context): bool
        {
            return 
                $context instanceof LoginResultDTO && 
                $context -> createSession === 'login' && 
                $context -> statusId;
        }

        public function apply(
            SessionInterface $session, 
            SessionContextInterface $context
            ): void {

            if (!$session -> has('id_status')) {
                $session -> set('id_status', $context -> statusId);
            }
        }
    }
?>