<?php
    namespace App\Service\AllSessions\SessionService;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    interface SessionActionInterface
    {
        public function supports(SessionContextInterface $context): bool;

        public function apply(SessionInterface $session, SessionContextInterface $context): void;
    }
?>