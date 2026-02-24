<?php
    namespace App\Service\GetCompetitionData\ResultsProvider;

    use App\Service\GetCompetitionData\CompetitionDataDTO\CompetitionDataContext;

    interface ResultsProviderInterface
    {
        public function supports(CompetitionDataContext $context): bool;

        public function getResults(CompetitionDataContext $context): array;

        public function getType(): string;
    }
?>