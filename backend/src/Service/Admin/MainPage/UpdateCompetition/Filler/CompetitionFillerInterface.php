<?php
    namespace  App\Service\Admin\MainPage\UpdateCompetition\Filler;

    use App\Service\Admin\MainPage\UpdateCompetition\CompetitionDTO\CompetitionContext;

    interface CompetitionFillerInterface
    {
        public function supports(array $data): bool;

        public function fill(array $data, CompetitionContext $context): void;
    }
?>