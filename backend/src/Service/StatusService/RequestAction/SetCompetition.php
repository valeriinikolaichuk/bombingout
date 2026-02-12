<?php
    namespace App\Service\StatusService\RequestAction;

    use App\Service\StatusService\Persistence\CompetitionUpdater;
    use App\Enum\PageEnum;

    class SetCompetition implements RequestActionInterface
    {
        public function __construct(
            private CompetitionUpdater $updater, 
        ) {}

        public function supports(string $action): bool
        {
            return $action === 'create';
        }

        public function action(array $data, string $action): string 
        {
            $usersId = (int)$data['usersId'];
            $comp_id = (int)$data['comp_id'];

            $this -> updater -> updateData($usersId, $comp_id);

            return 'success';
        }
    }
?>