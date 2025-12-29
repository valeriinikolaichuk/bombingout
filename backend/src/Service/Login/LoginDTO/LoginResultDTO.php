<?php
    namespace App\Service\Login\LoginDTO;

    class LoginResultDTO
    {
        public bool $success;
        public ?string $message = null;
        public ?LoginContext $context = null;
        public ?int $statusId = null;

        public function toArray(): array
        {
            return [
                'success' => $this -> success,
                'message' => $this -> message,
                'language'=> $this -> context?-> language ?? null,
                'page'    => $this -> context?-> page ?? null,
                'ip'      => $this -> context?-> ip ?? null,
                'agent'   => $this -> context?-> agent ?? null,
                'id'      => $this -> context?-> user?-> getId() ?? null,
                'statusId'=> $this -> statusId
            ];
        }
    }
?>