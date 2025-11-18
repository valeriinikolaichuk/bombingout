<?php
    namespace App\Service;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    interface SetStatusInterface
    {
        public function handle(SessionInterface $session, ?string $compStatus = null): string;
    }
?>