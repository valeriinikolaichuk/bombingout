<?php
    namespace  App\Service\Admin\MainPage\GetCompetitionData\DataFiller;

    use App\Service\Admin\MainPage\GetCompetitionData\CompetitionDataDTO\CompetitionDataContext;

    class CompetitionListFiller implements CompetitionDataFillerInterface
    {
        public function supports(array $data): bool
        {
            return isset($data['dataType'])
                && $data['dataType'] === 'openPopup'  
                && isset($data['usersId']);
        }

        public function fill(array $data, CompetitionDataContext $context): void
        {
            $context -> dataType = $data['dataType'];
            $context -> usersId = (int)$data['usersId'];
        }
    }
?>