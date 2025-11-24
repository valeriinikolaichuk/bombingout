<?php
    namespace App\Service\Login;

    use App\Entity\UserReg;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class LoginStrategyLocal implements LoginInterface {
        public function __construct(private LoginService $loginService) {}

        public function login(SessionInterface $session, UserReg $user, string $language, string $ip, string $agent): array
        {
            $this -> loginService -> loginUser($session, $user, $language, $ip, $agent);

            return ['success' => true];
        }
    }
?>