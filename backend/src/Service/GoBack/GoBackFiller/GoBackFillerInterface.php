<?php
    namespace App\Service\GoBack\GoBackFiller;

    use App\Service\GoBack\GoBackDTO\GoBackContext;

    use Symfony\Component\HttpFoundation\Request;

    interface GoBackFillerInterface
    {
        public function supports(Request $request): bool;

        public function fill(GoBackContext $context, Request $request): void;
    }
?>