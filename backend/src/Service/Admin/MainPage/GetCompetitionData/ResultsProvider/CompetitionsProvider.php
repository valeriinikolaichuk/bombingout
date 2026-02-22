<?php
    namespace App\Service\Admin\MainPage\GetCompetitionData\ResultsProvider;

    use App\Repository\CompetitionsRepository;
    use App\Entity\Competitions;
    use App\Service\Admin\MainPage\GetCompetitionData\CompetitionDataDTO\CompetitionDataContext;
    use App\Service\Admin\MainPage\GetCompetitionData\CompetitionDataDTO\ResultDTO\CompetitionResultItemDTO;

    class CompetitionsProvider implements ResultsProviderInterface
    {
        public function __construct(
            private CompetitionsRepository $repo
        ) {}

        public function supports(CompetitionDataContext $context): bool
        {
            return $context -> dataType === 'openPopup' 
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
    }
?>