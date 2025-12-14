<?php
    namespace App\Service\Login;

    use App\Service\AllSessions\SessionContextInterface;

    class LoginResultDTO implements SessionContextInterface
    {
        public bool $success;
        public ?string $message = null;
        public ?LoginContext $context = null;
        public ?string $createSession = null;
        public ?int $statusId = null;

        public function toArray(): array
        {
            return [
                'success' => $this -> success,
                'message' => $this -> message,
                'page' => $this -> context -> page,
                'ip' => $this -> context -> ip,
                'agent' => $this -> context -> agent,
                'id' => $this -> context -> user -> getId(),
            ];
        }
    }
?>