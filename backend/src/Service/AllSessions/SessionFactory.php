<?php
    namespace App\Service\AllSessions;

//    use App\Service\AllSessions\SessionService\SessionActionInterface;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class SessionFactory
    {
        /** @var iterable<SessionActionInterface> */
        public function __construct(private iterable $actions) {}

        public function create(SessionInterface $session, SessionContextInterface $context): void
        {
            foreach ($this -> actions as $action) {
                if ($action -> supports($context)) {
                    $action -> apply($session, $context);
                }
            }
        }
    }
?>