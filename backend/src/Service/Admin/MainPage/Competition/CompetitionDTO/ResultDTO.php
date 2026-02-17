<?php
    namespace App\Service\Admin\MainPage\Competition\CompetitionDTO;

    class ResultDTO{
        public ?bool $success = false;
        public ?bool $compID = false;

        public function toArray(): array
        {
            return [
                'success' => $this -> success,
                'compID'  => $this -> compID
            ];
        }
    }
?>