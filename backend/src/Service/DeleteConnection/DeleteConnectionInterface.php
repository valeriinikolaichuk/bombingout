<?php
    namespace App\Service\DeleteConnection;

    use App\Service\DeleteConnection\DeleteConnectionDTO\DeleteConnectionContext;
    use App\Service\DeleteConnection\DeleteConnectionDTO\CleanConnectionDTO;

    interface DeleteConnectionInterface
    {
        public function supports(DeleteConnectionContext $context): bool;

        public function execute(
            CleanConnectionDTO $dto, 
            DeleteConnectionContext $context
        ): CleanConnectionDTO;
    }
?>