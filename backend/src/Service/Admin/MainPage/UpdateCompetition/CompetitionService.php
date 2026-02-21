<?php
    namespace App\Service\Admin\MainPage\UpdateCompetition;

    use App\Service\Admin\MainPage\UpdateCompetition\CompetitionDTO\CompetitionContext;
    use App\Service\Admin\MainPage\UpdateCompetition\Result\CompetitionResultInterface;
    use App\Service\Admin\MainPage\UpdateCompetition\CompetitionDTO\ResultDTO;

    class CompetitionService
    {
        /** @var CompetitionResultInterface[] */
        public function __construct(private iterable $resultComp) {}

        public function edit(CompetitionContext $context): ResultDTO
        {
            $resultDto = new ResultDTO();

            foreach ($this -> resultComp as $result) {
                if ($result -> supports($context)) {
                    $result -> execute($context, $resultDto);
                }
            }

            return $resultDto;
        }
    }
?>