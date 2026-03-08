<?php
    namespace  App\Service\Admin\MainPage\UpdateCompetition\Result;

    use App\Service\StatusService\RequestActionFactory;
    use App\Service\Admin\MainPage\UpdateCompetition\CompetitionDTO\CompetitionContext;
    use App\Service\Admin\MainPage\UpdateCompetition\CompetitionDTO\ResultDTO;

    class SetStatusCompetition implements CompetitionResultInterface
    {
        public function __construct(
            private RequestActionFactory $factory
        ) {}

        public function supports(CompetitionContext $context): bool
        {
            return $context -> popupType === 'create';
        }

        public function execute(CompetitionContext $context, ResultDTO $result): void
        {
            $data = array();

            $data['comp_id'] = $context -> comp_id;
            $data['usersId'] = $context -> usersId;

            $action = $context -> popupType;

            $actionResult = $this -> factory -> action($data, $action);

            if ($actionResult == 'success'){
                $result -> status = true;
            }
        }
    }
?>