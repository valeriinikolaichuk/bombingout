<?php
    namespace App\Service\Login\LoginCompleted;

    use App\Service\Login\Sessions\SessionFactory;
    use App\Service\Login\LoginDTO\LoginResultDTO; 

    class CreateSession implements LoginCompletedInterface
    {
        public function __construct(
            private SessionFactory $sessionFactory
        ) {}

        public function supports(LoginResultDTO $result): bool
        {
            return $result -> context -> page === null;
        }

        public function actions(LoginResultDTO $result): LoginResultDTO
        {
            $result = $this -> sessionFactory -> create($result);

            return $result;
        }
    }
?>