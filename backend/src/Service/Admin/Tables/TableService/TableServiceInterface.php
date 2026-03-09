<?php
    namespace App\Service\Admin\Tables\TableService;

    use App\Service\Admin\Tables\TableContext;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    interface TableServiceInterface
    {
        public function supports(TableContext $context, SessionInterface $session): bool;

        public function resolve(TableContext $context, SessionInterface $session): array;
    }
?>