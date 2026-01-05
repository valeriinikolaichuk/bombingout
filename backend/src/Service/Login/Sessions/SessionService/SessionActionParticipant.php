<?php
    namespace App\Service\Login\Sessions\SessionService;

    use App\Service\Login\LoginDTO\LoginResultDTO;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class SessionActionParticipant implements SessionActionInterface
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

            if ($user -> getStatus() === 'participant'){
                $session -> set('nominations_id', $user -> getNominationsId());
            }      
        }
    }
?>