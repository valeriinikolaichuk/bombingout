<?php
    namespace App\Service\Login;

    use App\Entity\UserReg;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class LoginStrategyRedirect implements LoginInterface {
        public function __construct() {}

        public function login(SessionInterface $session, UserReg $user, string $language, string $ip, string $agent): array
        {
            return [
                'success' => true,
                'message' => 'true',
                'page'    => '/'.$language
            ];
        }
    }
?>