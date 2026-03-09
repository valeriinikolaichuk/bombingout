<?php
    namespace  App\Service\Admin\Tables\Filler;

    use App\Service\Admin\Tables\TableContext;

    interface TableFillerInterface
    {
        public function supports(array $data): bool;

        public function fill(array $data, TableContext $context): void;
    }
?>