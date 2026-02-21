<?php
    namespace  App\Service\Admin\MainPage\GetCompetitionData\DataFiller;

    use App\Service\Admin\MainPage\GetCompetitionData\CompetitionDataDTO\CompetitionDataContext;

    interface CompetitionDataFillerInterface
    {
        public function supports(array $data): bool;

        public function fill(array $data, CompetitionDataContext $context): void;
    }
?>