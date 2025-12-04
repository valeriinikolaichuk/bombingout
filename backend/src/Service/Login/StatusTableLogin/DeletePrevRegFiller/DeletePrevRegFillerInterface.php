<?php
    namespace App\Service\Login\StatusTableLogin\DeletePrevRegFiller;

    use App\Service\Login\StatusTableLogin\DeletePrevRegContext;

    use Symfony\Component\HttpFoundation\Request;

    interface DeletePrevRegFillerInterface
    {
        public function supports(Request $request): bool;

        public function fill(DeletePrevRegContext $context, Request $request): void;
    }
?>