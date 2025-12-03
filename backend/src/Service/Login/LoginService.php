<?php
    namespace App\Service\Login;

    use App\Service\Login\StatusTableLogin\ComputerStatusService;

    class LoginService {
        public function __construct(
            private LoginSessionService $sessionService,
            private ComputerStatusService $computerStatusService
        ) {}

        public function loginUser(LoginContext $context): void {

            $session  = $context -> session;
            $user     = $context -> user;

            $this -> sessionService -> setUserSession($context);

            if ($user -> getStatus() !== 'participant' && !$session -> has('id_status')) {
                $idStatus = $this -> computerStatusService -> createStatus($context);
                $session -> set('id_status', $idStatus);
                $session -> save();
            }
        }
    }
?>