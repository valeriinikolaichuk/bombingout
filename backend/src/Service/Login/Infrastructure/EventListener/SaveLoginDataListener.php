<?php
    namespace App\Infrastructure\Persistence\EventListener;

    use App\Service\Login\Event\LoginCompletedEvent;
    use App\Infrastructure\Persistence\ComputerStatus\ComputerStatusWriter;
    use App\Service\AllSessions\SessionFactory;

    class SaveLoginDataListener
    {
        public function __construct(
            private ComputerStatusWriter $writer,
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

            $result -> statusId = $this -> writer -> saveData($result -> context);

            $this -> sessionFactory -> create(
                $result -> context -> session,
                $result
            );
        }
    }
?>