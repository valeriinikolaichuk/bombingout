<?php
    namespace App\Service\Login;

    use App\Entity\UserReg;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class LoginStrategyProd implements LoginInterface {
        public function __construct(
            private CheckUserInTable $checker,
            private LoginService $loginService
        ) {}

        public function login(SessionInterface $session, UserReg $user, string $language, string $ip, string $agent): array {
            if ($this -> checker -> existsForUser($user->getId(), $ip, $agent)) {
                return [
                    'success' => false,
                    'message' => 'You are already logged in from this browser',
                    'id'      => $user->getId(),
                    'ip'      => $ip,
                    'agent'   => $agent
                ];
            }

            $this -> loginService -> loginUser($session, $user, $language, $ip, $agent);

            return ['success' => true];
        }
    }
?>