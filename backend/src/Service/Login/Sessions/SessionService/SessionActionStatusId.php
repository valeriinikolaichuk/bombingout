<?php
    namespace App\Service\Login\Sessions\SessionService;

    use App\Service\Login\LoginDTO\LoginResultDTO;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class SessionActionStatusId implements SessionActionInterface
    {
        public function supports(LoginResultDTO $result): bool 
        {
            return $result -> statusId !== null;
        }

        public function apply(
            SessionInterface $session, 
            LoginResultDTO $result
        ): void {
            $session -> set('id_status', $result -> statusId);
        }
    }
?>