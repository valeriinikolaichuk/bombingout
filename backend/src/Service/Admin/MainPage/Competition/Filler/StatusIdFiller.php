<?php
    namespace  App\Service\Admin\MainPage\Competition\Filler;

    use App\Service\Admin\MainPage\Competition\CompetitionDTO\CompetitionContext;

    class StatusIdFiller implements CompetitionFillerInterface
    {
        public function supports(array $data): bool
        {
            return isset($data['id_status']);
        }

        public function fill(array $data, CompetitionContext $context): void
        {
            $context -> id_status = (int)$data['id_status'];
        }
    }
?>