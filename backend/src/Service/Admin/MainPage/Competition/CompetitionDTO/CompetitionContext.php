<?php
    namespace App\Service\Admin\MainPage\Competition\CompetitionDTO;

    class CompetitionContext{
        public ?string $popupType = null;

        public ?int $comp_id = null;
        public ?int $usersId = null;
        public ?int $id_status = null;

        public ?string $competition_name = null;
        public ?string $country = null;
        public ?string $city = null;
        public ?\DateTimeImmutable $start_date = null;
        public ?\DateTimeImmutable $end_date = null;
        public ?string $division = null;
        public ?string $sex = null;
        public ?string $age_group = null;
        public ?string $type = null;
        public ?string $version = null;
    }
?>