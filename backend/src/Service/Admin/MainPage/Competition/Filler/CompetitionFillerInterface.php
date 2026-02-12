<?php
    namespace  App\Service\Admin\MainPage\Competition\Filler;

    use App\Service\Admin\MainPage\Competition\CompetitionDTO\CompetitionContext;

    interface CompetitionFillerInterface
    {
        public function supports(array $data): bool;

        public function fill(array $data, CompetitionContext $context): void;
    }
?>