<?php
    namespace App\Service\Admin\MainPage\GetCompetitionData\CompetitionDataDTO\ResultDTO;

    use App\Entity\Competitions;

    class CompetitionResultItemDTO implements ResultItemDTOInterface
    {
        public function __construct(
            private ?int $comp_id,
            private ?string $competition_name,
            private ?string $country,
            private ?string $city,
            private ?\DateTimeImmutable $start_date,
            private ?\DateTimeImmutable $end_date,
            private ?string $division,
            private ?string $sex,
            private ?string $age_group,
            private ?string $type,
            private ?string $version
        ) {}

        public static function fromEntity(Competitions $e): self
        {
            return new self(
                $e ->getCompId(),
                $e ->getCompetitionName(),
                $e ->getCountry(),
                $e ->getCity(),
                $e ->getStartDate(),
                $e ->getEndDate(),
                $e ->getDivision(),
                $e ->getSex(),
                $e ->getAgeGroup(),
                $e ->getType(),
                $e ->getCategories()
            );
        }

        public function toArray(): array
        {
            return [
                'comp_id'          => $this -> comp_id,
                'competition_name' => $this -> competition_name,
                'country'          => $this -> country,
                'city'             => $this -> city,
                'start_date'       => $this -> start_date?->format('Y-m-d'),
                'end_date'         => $this -> end_date?->format('Y-m-d'),
                'division'         => $this -> division,
                'sex'              => $this -> sex,
                'age_group'        => $this -> age_group,
                'type'             => $this -> type,
                'version'          => $this -> version
            ];
        }
    }
?>