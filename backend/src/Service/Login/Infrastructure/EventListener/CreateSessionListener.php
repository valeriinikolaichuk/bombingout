<?php
    namespace App\Infrastructure\Persistence\EventListener;

    use App\Service\Login\Event\LoginCompletedEvent;
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