<?php
    namespace App\Service\AllSessions\SessionService;
use App\Service\AllSessions\SessionActionInterface;
    use App\Service\AllSessions\SessionContextInterface;
    use App\Service\Login\LoginDTO\LoginResultDTO;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class SessionActionLogin implements SessionActionInterface
    {
        public function supports(SessionContextInterface $context): bool
        {
            return $context instanceof LoginResultDTO;
        }

        public function apply(
            SessionInterface $session, 
            SessionContextInterface $context
            ): void {

            if (!$session -> has('id')) {
                $session -> set('id', $context -> user -> getId());
            }

            if (!$session -> has('status')) {
                $session -> set('status', $context -> user -> getStatus());
            }

            if (!$session -> has('language')) {
                $session -> set('language', $context -> context -> language);
            }
        }
    }
?>