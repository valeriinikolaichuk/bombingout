<?php
    namespace  App\Service\GetCompetitionData\DataFiller;

    use App\Service\GetCompetitionData\CompetitionDataDTO\CompetitionDataContext;

    interface CompetitionDataFillerInterface
    {
        public function supports(array $data): bool;

        public function fill(array $data, CompetitionDataContext $context): void;
    }
?>