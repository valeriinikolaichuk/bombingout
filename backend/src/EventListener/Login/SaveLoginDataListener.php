<?php
    namespace App\EventListener\Login;

    use App\Event\Login\LoginCompletedEvent;
    use App\Service\Login\StatusTableLogin\SaveLoginDataLocal;
    use App\Service\Login\StatusTableLogin\SaveLoginDataProd;
    use App\Service\AllSessions\SessionFactory;

    class SaveLoginDataListener
    {
        public function __construct(
            private SaveLoginDataLocal $saveLoginDataLocal,
            private SaveLoginDataProd $saveLoginDataProd,
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

            if ($result -> context -> ip ||
                $result -> context -> agent)
            {
                $statusId = $this -> saveLoginDataLocal -> saveData(
                    $result -> context
                );
            } else {
                $statusId = $this -> saveLoginDataProd -> saveData(
                    $result -> context
                );
            }

            $result -> statusId = $statusId;

            $this -> sessionFactory -> create(
                $result -> context -> session,
                $result
            );
        }
    }
?>