<?php
    namespace App\Service\Login\DeleteOldLogin;

    class DeletePrevRegChecker
    {
        /** @var DeletePreviousRegInterface[] */
        public function __construct(private iterable $checkersDel) {}

        public function deleteEntry(DeletePrevRegContext $context): array
        {
            foreach ($this -> checkersDel as $checker) {
                if ($checker -> supports($context)) {
                    $result = $checker -> execute($context);

                    return $result;
                }
            }
        }
    }
?>