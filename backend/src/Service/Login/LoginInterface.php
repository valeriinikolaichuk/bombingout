<?php
    namespace App\Service\Login;

    use App\Entity\UserReg;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    interface LoginInterface {
        public function login(SessionInterface $session, UserReg $user, string $language, string $ip, string $agent): array;
    }
?>