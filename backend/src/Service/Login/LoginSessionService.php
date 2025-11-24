<?php
    namespace App\Service\Login;

    use App\Entity\UserReg;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class LoginSessionService {
        public function setUserSession(SessionInterface $session, UserReg $user, string $language): void {
            $session -> set('id', $user -> getId());
            $session -> set('status', $user -> getStatus());
            $session -> set('language', $language);

            if ($user -> getStatus() === 'participant') {
                $session -> set('nominations_id', $user -> getNominationsId());
            }

            $session -> save();
        }
    }
?>