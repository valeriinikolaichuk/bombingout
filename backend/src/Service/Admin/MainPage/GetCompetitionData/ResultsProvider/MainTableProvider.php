<?php
    namespace App\Service\Admin\MainPage\GetCompetitionData\ResultsProvider;

    use App\Repository\MainTableRepository;
    use App\Entity\MainTable;
    use App\Service\Admin\MainPage\GetCompetitionData\CompetitionDataDTO\CompetitionDataContext;
    use App\Service\Admin\MainPage\GetCompetitionData\CompetitionDataDTO\ResultDTO\MainTableResultItemDTO;

    class MainTableProvider implements ResultsProviderInterface
    {
        public function __construct(
            private MainTableRepository $repo
        ) {}

        public function supports(CompetitionDataContext $context): bool
        {
            return $context -> dataType === 'mainTable' 
                && $context -> compID !== null;
        }

        public function getResults(CompetitionDataContext $context): array
        {
            $entities = $this -> repo ->findByCompId($context->compID);

            return array_map(
                fn(MainTable $e) => MainTableResultItemDTO::fromEntity($e),
                $entities
            );
        }
    }
?>