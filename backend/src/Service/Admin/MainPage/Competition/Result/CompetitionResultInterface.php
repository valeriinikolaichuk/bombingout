<?php
    namespace  App\Service\Admin\MainPage\Competition\Result;

    use App\Service\Admin\MainPage\Competition\CompetitionDTO\CompetitionContext;
    use App\Service\Admin\MainPage\Competition\CompetitionDTO\ResultDTO;

    interface CompetitionResultInterface
    {
        public function supports(CompetitionContext $context): bool;

        public function execute(CompetitionContext $context, ResultDTO $result): void;
    }
?>