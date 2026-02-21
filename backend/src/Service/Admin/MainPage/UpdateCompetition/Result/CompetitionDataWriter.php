<?php
    namespace  App\Service\Admin\MainPage\UpdateCompetition\Result;

    use App\Service\Admin\MainPage\UpdateCompetition\CompetitionDTO\CompetitionContext;
    use App\Service\Admin\MainPage\UpdateCompetition\CompetitionDTO\ResultDTO;
    use App\Entity\Competitions;
    use App\Entity\UserReg;

    use Doctrine\ORM\EntityManagerInterface;

    class CompetitionDataWriter implements CompetitionResultInterface
    {
        public function __construct(private EntityManagerInterface $em) {}

        public function supports(CompetitionContext $context): bool
        {
            return $context -> popupType === 'create' 
                && $context -> comp_id === null;
        }

        public function execute(CompetitionContext $context, ResultDTO $result): void
        {
            $user = $this -> em -> getRepository(UserReg::class) ->find($context -> usersId);

            if (!$user) {
                throw new \RuntimeException("User with ID {$context->usersId} not found.");
            }

            $competition = new Competitions();
            $competition -> setUser($user);
            $competition -> setCompetitionName($context -> competition_name ?? null);
            $competition -> setCountry($context -> country ?? null);
            $competition -> setCity($context -> city ?? null);
            $competition -> setStartDate($context -> start_date ?? null);
            $competition -> setEndDate($context -> end_date ?? null);
            $competition -> setDivision($context -> division ?? null);
            $competition -> setAgeGroup($context -> age_group ?? null);
            $competition -> setSex($context -> sex ?? null);
            $competition -> setType($context -> type ?? null);
            $competition -> setCategories($context -> version ?? null);

            $this -> em ->persist($competition);
            $this -> em ->flush();

            $context -> comp_id = (int)$competition -> getId();
            $result -> compID = (int)$competition -> getId();
        }
    }
?>