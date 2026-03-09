<?php
    namespace  App\Service\Admin\Tables\Filler;

    use App\Service\Admin\Tables\TableContext;

    class MainTableFiller implements TableFillerInterface
    {
        public function supports(array $data): bool
        {
            return isset($data['type']) 
                && isset($data['rows']);
        }

        public function fill(array $data, TableContext $context): void
        {
            $context -> type = $data['type'];
            $context -> rows = $data['rows'];
        }
    }
?>