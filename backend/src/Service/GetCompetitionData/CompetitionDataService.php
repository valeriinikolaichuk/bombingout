<?php
    namespace App\Service\GetCompetitionData;

    use App\Service\GetCompetitionData\ResultsProvider\ResultsProviderInterface;
    use App\Service\GetCompetitionData\CompetitionDataDTO\CompetitionDataContext;
    use App\Service\GetCompetitionData\CompetitionDataDTO\CompetitionDataResponseDTO;

    class CompetitionDataService
    {
        /** @var iterable<ResultsProviderInterface> */
        public function __construct(private iterable $providers) {}

        public function execute(CompetitionDataContext $context): CompetitionDataResponseDTO
        {
            $response = new CompetitionDataResponseDTO();

            foreach ($this -> providers as $provider) {

                if (!$provider -> supports($context)) {
                    continue;
                }

                $result = $provider -> getResults($context);

                match ($provider -> getType()) {
                    'competitions' => $response -> setCompetitions($result),
                    'mainTable' => $response -> setMainTable($result),
                };
            }

            return $response;
        }
    }
?>