<?php
    namespace App\Service\Login;

    class LoginSessionService {
        public function setUserSession(LoginContext $context): void {

            $session  = $context -> session;
            $user     = $context -> user;
            $language = $context -> language;

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