<?php
    namespace App\Service\Login\LoginCompleted;

    use App\Service\Login\Persistence\ComputerStatusWriter;
    use App\Service\Login\LoginDTO\LoginResultDTO;

    class SaveLoginData implements LoginCompletedInterface
    {
        public function __construct(
            private ComputerStatusWriter $writer,
        ) {}

        public function supports(LoginResultDTO $result): bool
        {
            return $result -> success ||  
                !$result -> context -> page;
        }

        public function actions(LoginResultDTO $result): LoginResultDTO
        {
            $context = $result -> context;

            $id = $this -> writer -> saveData(
                userId:   $context -> user -> getId(),
                status:   $context -> user -> getStatus(),
                language: $context -> language,
                ip:       $context -> ip,
                agent:    $context -> agent
            );

            $result -> statusId = $id;

            return $result;
        }
    }
?>