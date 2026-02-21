<?php
    namespace App\Service\Admin\MainPage\UpdateCompetition\CompetitionDTO;

    class ResultDTO{
        public ?bool $success = false;
        public ?bool $session = false;
        public ?int $compID = null;

        public function toArray(): array
        {
            return [
                'success' => $this -> success,
                'session' => $this -> session,
                'compID'  => $this -> compID
            ];
        }
    }
?>