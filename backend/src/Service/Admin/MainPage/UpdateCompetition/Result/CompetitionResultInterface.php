<?php
    namespace  App\Service\Admin\MainPage\UpdateCompetition\Result;

    use App\Service\Admin\MainPage\UpdateCompetition\CompetitionDTO\CompetitionContext;
    use App\Service\Admin\MainPage\UpdateCompetition\CompetitionDTO\ResultDTO;

    interface CompetitionResultInterface
    {
        public function supports(CompetitionContext $context): bool;

        public function execute(CompetitionContext $context, ResultDTO $result): void;
    }
?>