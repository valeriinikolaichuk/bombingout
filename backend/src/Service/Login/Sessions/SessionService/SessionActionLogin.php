<?php
    namespace App\Service\Login\Sessions\SessionService;
//use App\Service\AllSessions\SessionActionInterface;
//    use App\Service\AllSessions\SessionContextInterface;
    use App\Service\Login\LoginDTO\LoginResultDTO;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class SessionActionLogin implements SessionActionInterface
    {
        public function supports(
            SessionInterface $session, 
            LoginResultDTO $context
        ): bool {
            return !$session -> has('id') &&
                !$session -> has('status') &&
                !$session -> has('language');
        }

        public function apply(
            SessionInterface $session, 
            LoginResultDTO $context
            ): void {

//            if (!$session -> has('id')) {
                $session -> set('id', $context -> user -> getId());
//            }

//            if (!$session -> has('status')) {
                $session -> set('status', $context -> user -> getStatus());
//            }

//            if (!$session -> has('language')) {
                $session -> set('language', $context -> context -> language);
//            }
        }
    }
?>