<?php
    namespace App\Service\Login\Sessions\SessionService;

    use App\Service\Login\LoginDTO\LoginResultDTO;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class SessionActionPage implements SessionActionInterface
    {
        public function supports(LoginResultDTO $result): bool 
        {
            return $result -> context -> page !== null;
        }

        public function apply(
            SessionInterface $session, 
            LoginResultDTO $result
        ): void {
            $action = $result -> context -> page;

            $session -> set('action', $action);

            if (!$session -> has('id_status')){
                $result -> success = false;
            } else {
                $id = $session -> get('id_status');

                $result -> statusId = $id;
            }
        }
    }
?>