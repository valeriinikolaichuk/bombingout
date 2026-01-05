<?php
    namespace App\Service\Login\Sessions;

    use App\Service\Login\Sessions\SessionService\SessionActionInterface;
    use App\Service\Login\LoginDTO\LoginResultDTO;

    use Symfony\Component\HttpFoundation\RequestStack;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class SessionFactory
    {
        /** @var iterable<SessionActionInterface[]> */
        public function __construct(
            private RequestStack $requestStack,
            private iterable $actions
        ) {}

        public function create(LoginResultDTO $result): void
        {
            $session = $this ->getSession();

            foreach ($this -> actions as $action) {
                if ($action -> supports($result)) {
                    $action -> apply($session, $result);
                }
            }
        }

        private function getSession(): SessionInterface
        {
            $request = $this -> requestStack ->getCurrentRequest();

            if (!$request || !$request ->hasSession()) {
                throw new \LogicException('Session is not available');
            }

            return $request ->getSession();
        }
    }
?>