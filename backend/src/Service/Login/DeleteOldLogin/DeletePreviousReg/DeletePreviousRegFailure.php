<?php
    namespace App\Service\Login\DeleteOldLogin\DeletePreviousReg;

    use App\Service\Login\DeleteOldLogin\DeletePreviousRegInterface;
    use App\Service\Login\DeleteOldLogin\DeletePrevRegContext;

    class DeletePreviousRegFailure implements DeletePreviousRegInterface
    {
        public function supports(DeletePrevRegContext $context): bool
        {
            return true;
        }

        public function execute(DeletePrevRegContext $context): array 
        {
            return [
                'success' => false, 
                'message' => 'deletion error'
            ];
        }
    }
?>