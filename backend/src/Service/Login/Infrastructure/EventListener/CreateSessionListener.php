<?php
    namespace App\Service\Login\Infrastructure\EventListener;

    use App\Service\Login\Event\LoginCompletedEvent;
    use App\Service\Login\Sessions\SessionFactory;

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