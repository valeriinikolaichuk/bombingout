<?php
    namespace  App\Service\Admin\MainPage\Competition\Result;

    use App\Service\Admin\MainPage\Competition\CompetitionDTO\CompetitionContext;
    use App\Service\Admin\MainPage\Competition\CompetitionDTO\ResultDTO;
    use App\Service\Http\SessionAwareTrait;

    use Symfony\Component\HttpFoundation\RequestStack;

    class SetSessionCompetition implements CompetitionResultInterface
    {
        use SessionAwareTrait;

        public function __construct(RequestStack $requestStack)
        {
            $this -> requestStack = $requestStack;
        }

        public function supports(CompetitionContext $context): bool
        {
            return $context -> popupType === 'create' 
                && $context -> comp_id !== null;
        }

        public function execute(CompetitionContext $context, ResultDTO $result): void
        {
            $session = $this ->getSession();
            $session -> set('compID', $context -> comp_id);

            $result -> compID = true;
        }
    }
?>