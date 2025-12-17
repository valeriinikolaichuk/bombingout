<?php
    namespace App\Service\Login\LoginDTO;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;
    use App\Entity\UserReg;

    class LoginContext
    {
        public ?string $loginMethod = null;
        public ?string $type = null;

        public ?string $login = null;
        public ?string $password = null;

        public ?string $language = null;
        public ?string $page = null;

        public ?string $ip = null;
        public ?string $agent = null;

        public SessionInterface $session;
        public ?UserReg $user = null;
    }
?>