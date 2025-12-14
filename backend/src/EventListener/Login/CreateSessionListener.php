<?php
    namespace App\EventListener\Login;

    use App\Event\Login\LoginCompletedEvent;
    use App\Service\AllSessions\SessionFactory;

    class CreateSessionListener
    {
        public function __construct(
            private SessionFactory $sessionFactory
        ) {}

        public function __invoke(LoginCompletedEvent $event): void
        {
            $result = $event -> result;

            if (!$result -> success || 
                !$result -> createSession || 
                $result -> context -> page) 
            {
                return;
            }

            $this -> sessionFactory -> create(
                $result -> context -> session,
                $result
            );
        }
    }
?>