<?php
    namespace App\Service\Login;

    use App\Entity\UserReg;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class LoginService {
        public function __construct(
            private LoginSessionService $sessionService,
            private ComputerStatusService $computerStatusService
        ) {}

        public function loginUser(SessionInterface $session, UserReg $user, string $language, string $ip, string $agent): void {
            $this -> sessionService -> setUserSession($session, $user, $language);

            if ($user -> getStatus() !== 'participant' && !$session -> has('id_status')) {
                $idStatus = $this -> computerStatusService -> createStatus($user, $language, $ip, $agent);
                $session -> set('id_status', $idStatus);
            }
        }
    }
?>