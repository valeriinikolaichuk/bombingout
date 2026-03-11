<?php
    namespace App\Message;

    final class CompetitionCreatedMessage
    {
        public function __construct(
            public ?string $comp_id = null,
            public ?int $users_id = null,
            public ?string $competition_name = null,
            public ?string $country = null,
            public ?string $city = null,
            public ?\DateTimeImmutable $start_date = null,
            public ?\DateTimeImmutable $end_date = null,
            public ?string $division = null,
            public ?string $sex = null,
            public ?string $age_group = null,
            public ?string $type = null,
            public ?string $version = null
        ) {}
    }
?>