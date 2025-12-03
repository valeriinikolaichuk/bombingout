<?php
    namespace App\Service\Login;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;
    use App\Entity\User;

    class LoginContext
    {
        public ?string $login = null;
        public ?string $password = null;

        public ?string $language = null;
        public ?string $page = null;

        public ?string $ip = null;
        public ?string $agent = null;

        public SessionInterface $session;
        public ?User $user = null;
    }
?>