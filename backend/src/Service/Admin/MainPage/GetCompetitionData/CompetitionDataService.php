<?php
    namespace App\Service\Admin\MainPage\GetCompetitionData;

    use App\Service\Admin\MainPage\GetCompetitionData\ResultsProvider\ResultsProviderInterface;
    use App\Service\Admin\MainPage\GetCompetitionData\CompetitionDataDTO\CompetitionDataContext;
    use App\Service\Admin\MainPage\GetCompetitionData\CompetitionDataDTO\ResultDTO;

    class CompetitionDataService
    {
        /** @var iterable<ResultsProviderInterface> */
        public function __construct(private iterable $providers) {}

        public function execute(CompetitionDataContext $context): ResultDTO
        {
            foreach ($this -> providers as $provider)
            {
                if ($provider -> supports($context))
                {
                    $items = $provider -> getResults($context);
                    return new ResultDTO($items);
                }
            }

            throw new \RuntimeException('No provider found');
        }
    }
?>