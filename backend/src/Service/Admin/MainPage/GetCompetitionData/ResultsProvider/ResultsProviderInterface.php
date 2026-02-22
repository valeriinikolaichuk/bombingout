<?php
    namespace App\Service\Admin\MainPage\GetCompetitionData\ResultsProvider;

    use App\Service\Admin\MainPage\GetCompetitionData\CompetitionDataDTO\CompetitionDataContext;
    use App\Service\Admin\MainPage\GetCompetitionData\CompetitionDataDTO\ResultDTO;

    interface ResultsProviderInterface
    {
        public function supports(CompetitionDataContext $context): bool;

        /** @return ResultDTO[] */
        public function getResults(CompetitionDataContext $context): array;
    }
?>