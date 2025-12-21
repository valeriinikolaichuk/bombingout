<?php
    namespace App\Service\Login\Sessions;

//    use App\Service\AllSessions\SessionService\SessionActionInterface;
use App\Service\Login\Sessions\SessionService\SessionActionInterface;
use App\Service\Login\LoginDTO\LoginResultDTO;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class SessionFactory
    {
        /** @var iterable<SessionActionInterface[]> */
        public function __construct(private iterable $actions) {}

        public function create(SessionInterface $session, LoginResultDTO $context): void
        {
            foreach ($this -> actions as $action) {
                if ($action -> supports($session, $context)) {
                    $action -> apply($session, $context);
                }
            }
        }
    }
?>