<?php
    namespace App\Service\GetCompetitionData;

    use App\Service\GetCompetitionData\ResultsProvider\ResultsProviderInterface;
    use App\Service\GetCompetitionData\CompetitionDataDTO\CompetitionDataContext;
    use App\Service\GetCompetitionData\CompetitionDataDTO\CompetitionDataResponseDTO;
    use App\Service\GetCompetitionData\CompetitionDataDTO\ResultDTO;

    class CompetitionDataService
    {
        /** @var iterable<ResultsProviderInterface> */
        public function __construct(private iterable $providers) {}

        public function execute(CompetitionDataContext $context): CompetitionDataResponseDTO
        {
            $response = new CompetitionDataResponseDTO(
                new ResultDTO([]),
                new ResultDTO([]),
                new ResultDTO([])
            );

            foreach ($this -> providers as $provider) {

                if (!$provider -> supports($context)) {
                    continue;
                }

                $result = $provider -> getResults($context);
                $resultDTO = new ResultDTO($result);

                match ($provider -> getType()) {
                    'competitions' => $response -> setCompetitions($resultDTO),
                    'mainTable'    => $response -> setMainTable($resultDTO),
                    'sessions'     => $response -> setSessionsTable($resultDTO)
                };
            }

            return $response;
        }
    }
?>