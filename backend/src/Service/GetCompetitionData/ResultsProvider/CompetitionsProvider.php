<?php
    namespace App\Service\GetCompetitionData\ResultsProvider;

    use App\Repository\CompetitionsRepository;
    use App\Entity\Competitions;
    use App\Service\GetCompetitionData\CompetitionDataDTO\CompetitionDataContext;
    use App\Service\GetCompetitionData\CompetitionDataDTO\ResultDTO\CompetitionResultItemDTO;

    class CompetitionsProvider implements ResultsProviderInterface
    {
        public function __construct(
            private CompetitionsRepository $repo
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
                fn(Competitions $e) => CompetitionResultItemDTO::fromEntity($e),
                $entities
            );
        }

        public function getType(): string
        {
            return 'competitions';
        }
    }
?>