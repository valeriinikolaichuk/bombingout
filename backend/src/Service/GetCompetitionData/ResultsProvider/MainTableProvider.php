<?php
    namespace App\Service\GetCompetitionData\ResultsProvider;

    use App\Repository\MainTableRepository;
    use App\Entity\MainTable;
    use App\Service\GetCompetitionData\CompetitionDataDTO\CompetitionDataContext;
    use App\Service\GetCompetitionData\CompetitionDataDTO\ResultDTO\MainTableResultItemDTO;

    class MainTableProvider implements ResultsProviderInterface
    {
        public function __construct(
            private MainTableRepository $repo
        ) {}

        public function supports(CompetitionDataContext $context): bool
        {
            return $context -> dataType === 'getAll' 
                && $context -> usersId !== null;
        }

        public function getResults(CompetitionDataContext $context): array
        {
            $entities = $this -> repo ->findByUserId($context->usersId);

            return array_map(
                fn(MainTable $e) => MainTableResultItemDTO::fromEntity($e),
                $entities
            );
        }

        public function getType(): string
        {
            return 'mainTable';
        }
    }
?>