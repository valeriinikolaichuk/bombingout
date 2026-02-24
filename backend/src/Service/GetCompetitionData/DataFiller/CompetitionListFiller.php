<?php
    namespace  App\Service\GetCompetitionData\DataFiller;

    use App\Service\GetCompetitionData\CompetitionDataDTO\CompetitionDataContext;

    class CompetitionListFiller implements CompetitionDataFillerInterface
    {
        public function supports(array $data): bool
        {
            return isset($data['dataType'])
                && $data['dataType'] === 'getAll'  
                && isset($data['usersId']);
        }

        public function fill(array $data, CompetitionDataContext $context): void
        {
            $context -> dataType = $data['dataType'];
            $context -> usersId = (int)$data['usersId'];
        }
    }
?>