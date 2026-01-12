<?php
    namespace App\Service\DeleteConnection\CleanConnection;

    use App\Service\DeleteConnection\DeleteConnectionInterface;
    use App\Service\DeleteConnection\DeleteConnectionContext;

    class DeleteConnectionFailure implements DeleteConnectionInterface
    {
        public function supports(DeleteConnectionContext $context): bool
        {
            return true;
        }

        public function execute(DeleteConnectionContext $context): array 
        {
            return [
                'success' => false, 
                'message' => 'deletion error'
            ];
        }
    }
?>