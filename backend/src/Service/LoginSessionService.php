<?php
    namespace App\Service;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;
    use App\Entity\UserReg;

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