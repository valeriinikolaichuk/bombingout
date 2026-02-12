<?php
    namespace  App\Service\Admin\MainPage\Competition\Filler;

    use App\Service\Admin\MainPage\Competition\CompetitionDTO\CompetitionContext;

    class CompetitionIdFiller implements CompetitionFillerInterface
    {
        public function supports(array $data): bool
        {
            return isset($data['comp_id']);
        }

        public function fill(array $data, CompetitionContext $context): void
        {
            $context -> comp_id = (int)$data['comp_id'];
        }
    }
?>