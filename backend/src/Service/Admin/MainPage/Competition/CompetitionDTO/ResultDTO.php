<?php
    namespace App\Service\Admin\MainPage\Competition\CompetitionDTO;

    class ResultDTO{
        public ?bool $success = false;
        public ?int $comp_id = null;

        public function toArray(): array
        {
            return [
                'success' => $this -> success,
                'comp_id' => $this -> comp_id
            ];
        }
    }
?>