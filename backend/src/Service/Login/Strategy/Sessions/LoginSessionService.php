<?php
    namespace App\Service\Login\Strategy\Sessions;

    use App\Service\Login\LoginContext;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;
    use App\Entity\User;

    class LoginSessionService implements LoginSessionServiceInterface
    {
        public function supports(LoginContext $context): bool
        {
            return empty($context -> page) 
                && !empty($context -> language);
        }

        public function setUserSession(
            SessionInterface $session,
            User $user,
            LoginContext $context
        ): void {
            $language = $context -> language;

            $session -> set('id', $user->getId());
            $session -> set('status', $user->getStatus());
            $session -> set('language', $language);

            if ($user->getStatus() === 'participant'){
                $session->set('nominations_id', $user->getNominationsId());
            }
        }
    }
?>