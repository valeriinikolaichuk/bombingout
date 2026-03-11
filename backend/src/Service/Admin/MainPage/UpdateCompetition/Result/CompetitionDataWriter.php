<?php
    namespace  App\Service\Admin\MainPage\UpdateCompetition\Result;

    use App\Service\Admin\MainPage\UpdateCompetition\CompetitionDTO\CompetitionContext;
    use App\Service\Admin\MainPage\UpdateCompetition\CompetitionDTO\ResultDTO;
    use App\Entity\Competitions;
    use App\Entity\UserReg;
    use App\Message\CompetitionCreatedMessage;

    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Component\Messenger\MessageBusInterface;

    class CompetitionDataWriter implements CompetitionResultInterface
    {
        public function __construct(
            private EntityManagerInterface $em, 
            private MessageBusInterface $bus
        ) {}

        public function supports(CompetitionContext $context): bool
        {
            return $context -> popupType === 'create';
        }

        public function execute(CompetitionContext $context, ResultDTO $result): void
        {
            $user = $this -> em -> getRepository(UserReg::class) ->find($context -> usersId);

            if (!$user) {
                throw new \RuntimeException("User with ID {$context->usersId} not found.");
            }

            $competition = new Competitions();
            
            $competition -> setUser($user);
            $competition -> setCompId($context -> comp_id ?? null);
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

            $result -> success = true;

            $this -> bus ->dispatch(
                new CompetitionCreatedMessage(
                    comp_id:          $context -> comp_id,
                    users_id:         $context -> usersId,
                    competition_name: $context -> competition_name,
                    country:          $context -> country,
                    city:             $context -> city,
                    start_date:       $context -> start_date,
                    end_date:         $context -> end_date,
                    division:         $context -> division,
                    sex:              $context -> sex,
                    age_group:        $context -> age_group,
                    type:             $context -> type,
                    version:          $context -> version
                )
            );
        }
    }
?>