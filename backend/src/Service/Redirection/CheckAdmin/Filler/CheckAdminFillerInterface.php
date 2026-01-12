<?php
    namespace App\Service\Redirection\CheckAdmin\Filler;

    use App\Service\Redirection\CheckAdmin\CheckAdminContext;

    use Symfony\Component\HttpFoundation\Request;

    interface CheckAdminFillerInterface
    {
        public function supports(Request $request): bool;

        public function fill(CheckAdminContext $context, Request $request): void;
    }
?>