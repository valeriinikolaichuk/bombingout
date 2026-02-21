<?php
    namespace  App\Service\Admin\MainPage\UpdateCompetition\Filler;

    use App\Service\Admin\MainPage\UpdateCompetition\CompetitionDTO\CompetitionContext;

    class CompetitionDataFiller implements CompetitionFillerInterface
    {
        public function supports(array $data): bool
        {
            return isset($data['popupType'])
                && isset($data['usersId']) 
                && isset($data['competition_name']) 
                && isset($data['country']) 
                && isset($data['city']) 
                && isset($data['start_date']) 
                && isset($data['end_date']) 
                && isset($data['division']) 
                && isset($data['sex']) 
                && isset($data['age_group']) 
                && isset($data['type']) 
                && isset($data['version']);
        }

        public function fill(array $data, CompetitionContext $context): void
        {
            $context -> popupType = $data['popupType'];
            $context -> usersId = (int)$data['usersId'];

            $context -> competition_name = $data['competition_name'];
            $context -> country = $data['country'];
            $context -> city = $data['city'];
            $context -> start_date = $data['start_date'];
            $context -> end_date = $data['end_date'];
            $context -> division = $data['division'];
            $context -> sex = $data['sex'];
            $context -> age_group = $data['age_group'];
            $context -> type = $data['type'];
            $context -> version = $data['version'];
        }
    }
?>