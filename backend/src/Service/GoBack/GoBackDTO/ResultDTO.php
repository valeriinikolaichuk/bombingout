<?php
    namespace App\Service\GoBack\GoBackDTO;

    class ResultDTO
    {
        public ?bool $success = false;
        public ?string $message = 'page return error';

        public function toArray(): array
        {
            return [
                'success' => $this -> success,
                'message' => $this -> message
            ];
        }
    }
?>