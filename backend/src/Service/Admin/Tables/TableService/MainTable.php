<?php
    namespace App\Service\Admin\Tables\TableService;

    use App\Service\Admin\Tables\TableContext;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class MainTable implements TableServiceInterface
    {
        public function supports(TableContext $context, SessionInterface $session): bool
        {
            return $context -> type === 'main_table' 
                && $session -> has('compID');
        }

        public function resolve(TableContext $context, SessionInterface $session): array
        {
            return [
                'table' => 'clients/components/admin/_main_table.html.twig',
                'data' => [
                    'rows'        => $context -> rows,
                    'compID'      => $session -> get('compID'),
                    'compVersion' => $session -> get('compVersion'),
                    'compSex'     => $session -> get('compSex')
                ],
            ];
        }
    }
?>