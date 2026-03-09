<?php
    namespace App\Service\Admin\Tables;

    use App\Service\Admin\Tables\Filler\TableFillerInterface;

    class TableContextBuilder
    {
        /** @var TableFillerInterface[] */
        public function __construct(private iterable $tableFillers) {}

        public function build(array $data): TableContext
        {
            $context = new TableContext();

            foreach ($this -> tableFillers as $filler) {
                if ($filler -> supports($data)) {
                    $filler -> fill($data, $context);
                }
            }

            return $context;
        }
    }
?>