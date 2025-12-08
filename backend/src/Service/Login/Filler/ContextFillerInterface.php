<?php
    namespace App\Service\Login\Filler;

    use App\Service\Login\LoginContext;

    use Symfony\Component\HttpFoundation\Request;

    interface ContextFillerInterface 
    {
        public function supports(Request $request): bool;

        public function fill(LoginContext $context, Request $request): void;
    }
?>