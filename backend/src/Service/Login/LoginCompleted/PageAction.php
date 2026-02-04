<?php
    namespace App\Service\Login\LoginCompleted;

    use App\Service\Login\Sessions\SessionFactory;
    use App\Service\Redirection\RequestActionFactory;
    use App\Service\Login\LoginDTO\LoginResultDTO; 

    class PageAction implements LoginCompletedInterface
    {
        public function __construct(
            private SessionFactory $sessionFactory,
            private RequestActionFactory $requestActionFactory
        ) {}

        public function supports(LoginResultDTO $result): bool
        {
            return $result -> context -> page !== null;
        }

        public function actions(LoginResultDTO $result): LoginResultDTO
        {
            $result = $this -> sessionFactory -> create($result);

            $data = array();
            $data['id_status'] = $result -> statusId;
            $action = $result -> context -> page;

            $action = $this -> requestActionFactory -> action($data, $action);            

            return $result;
        }
    }
?>