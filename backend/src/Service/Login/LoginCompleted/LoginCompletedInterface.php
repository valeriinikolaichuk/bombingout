<?php
    namespace App\Service\Login\LoginCompleted;

    use App\Service\Login\LoginDTO\LoginResultDTO;

    interface LoginCompletedInterface 
    {
        public function supports(LoginResultDTO $result): bool;

        public function actions(LoginResultDTO $result): LoginResultDTO;
    }
?>