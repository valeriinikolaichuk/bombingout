<?php
    namespace App\Service\Redirection\StatusTableRedirection;

    class ComputerStatusContext
    {
        public ?int $userId = null;
        public ?string $comp_status = null;

        public bool $valid = false;
    }
?>