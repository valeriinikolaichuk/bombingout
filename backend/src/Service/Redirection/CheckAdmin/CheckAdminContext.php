<?php
    namespace App\Service\Redirection\CheckAdmin;

    class CheckAdminContext
    {
        public ?int $userId = null;
        public ?string $comp_status = null;

        public bool $valid = false;
    }
?>