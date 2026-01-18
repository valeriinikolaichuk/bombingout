<?php
    namespace App\Service\DeleteConnection;

    use App\Service\DeleteConnection\DeleteConnectionDTO\DeleteConnectionContext;
    use App\Service\DeleteConnection\DeleteConnectionDTO\CleanConnectionDTO;

    class DeleteConnectionChecker
    {
        /** @var DeleteConnectionInterface[] */
        public function __construct(private iterable $checkersDel) {}

        public function deleteEntry(DeleteConnectionContext $context): CleanConnectionDTO
        {
            $dto = new CleanConnectionDTO(); 

            foreach ($this -> checkersDel as $checker) {
                if ($checker -> supports($context)) {
                    $result = $checker -> execute($dto, $context);

                    return $result;
                }
            }

            return $dto;
        }
    }
?>