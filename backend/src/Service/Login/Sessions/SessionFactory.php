<?php
    namespace App\Service\Login\Sessions;

    use App\Service\Http\SessionAwareTrait;
    use App\Service\Login\Sessions\SessionService\SessionActionInterface;
    use App\Service\Login\LoginDTO\LoginResultDTO;

    use Symfony\Component\HttpFoundation\RequestStack;

    class SessionFactory
    {
        use SessionAwareTrait;

        /** @var iterable<SessionActionInterface[]> */
        private iterable $actions;

        public function __construct(
            RequestStack $requestStack,
            iterable $actions
        ) {
            $this -> requestStack = $requestStack;
            $this -> actions = $actions;
        }

        public function create(LoginResultDTO $result): void
        {
            $session = $this ->getSession();

            foreach ($this -> actions as $action) {
                if ($action -> supports($result)) {
                    $action -> apply($session, $result);
                }
            }
        }
    }
?>