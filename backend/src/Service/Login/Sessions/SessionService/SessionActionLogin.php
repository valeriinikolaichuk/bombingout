<?php
    namespace App\Service\Login\Sessions\SessionService;

    use App\Service\Login\LoginDTO\LoginResultDTO;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class SessionActionLogin implements SessionActionInterface
    {
        public function supports(LoginResultDTO $result): bool 
        {
            return $result -> context -> user !== null;
        }

        public function apply(
            SessionInterface $session, 
            LoginResultDTO $result
        ): void {
                $user = $result -> context -> user;

                $session -> set('id', $user -> getId());
                $session -> set('status', $user -> getStatus());
                $session -> set('language', $result -> context -> language);
        }
    }
?>