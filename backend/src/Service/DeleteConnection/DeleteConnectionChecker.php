<?php
    namespace App\Service\DeleteConnection;

    class DeleteConnectionChecker
    {
        /** @var DeleteConnectionInterface[] */
        public function __construct(private iterable $checkersDel) {}

        public function deleteEntry(DeleteConnectionContext $context): array
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