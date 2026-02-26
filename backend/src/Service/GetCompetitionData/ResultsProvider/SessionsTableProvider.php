<?php
    namespace App\Service\GetCompetitionData\ResultsProvider;

    use App\Repository\SessionsTableRepository;
    use App\Entity\SessionsTable;
    use App\Service\GetCompetitionData\CompetitionDataDTO\CompetitionDataContext;
    use App\Service\GetCompetitionData\CompetitionDataDTO\ResultDTO\SessionsTableResultItemDTO;

    class SessionsTableProvider implements ResultsProviderInterface
    {
        public function __construct(
            private SessionsTableRepository $repo
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
                fn(SessionsTable $e) => SessionsTableResultItemDTO::fromEntity($e),
                $entities
            );
        }

        public function getType(): string
        {
            return 'sessions';
        }
    }
?>