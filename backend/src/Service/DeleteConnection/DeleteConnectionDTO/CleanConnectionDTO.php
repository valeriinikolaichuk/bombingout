<?php
    namespace App\Service\DeleteConnection\DeleteConnectionDTO;

    class CleanConnectionDTO
    {
        public ?bool $success = false;
        public ?string $message = 'deletion error';

        public function toArray(): array
        {
            return [
                'success' => $this -> success,
                'message' => $this -> message
            ];
        }
    }
?>