<?php
    namespace App\Service\Login\Sessions\SessionService;
//use App\Service\AllSessions\SessionActionInterface;
//    use App\Service\AllSessions\SessionContextInterface;
    use App\Service\Login\LoginDTO\LoginResultDTO;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class SessionActionStatusId implements SessionActionInterface
    {
        public function supports(
            SessionInterface $session, 
            LoginResultDTO $context
        ): bool {
            return !$session -> has('id_status') && 
                $context -> statusId;
        }

        public function apply(
            SessionInterface $session, 
            LoginResultDTO $context
            ): void {

//            if (!$session -> has('id_status')) {
                $session -> set('id_status', $context -> statusId);
//            }
        }
    }
?>