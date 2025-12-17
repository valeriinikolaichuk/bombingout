<?php
    namespace App\Service\Login\Filler;

    use App\Service\Login\LoginDTO\LoginContext;

    use Symfony\Component\HttpFoundation\Request;

    class TypeFiller implements ContextFillerInterface
    {
        public function supports(Request $request): bool
        {
            return true;
        }

        public function fill(LoginContext $context, Request $request): void
        {
            $data = json_decode($request -> getContent(), true);

            $context -> type = $data['type'] ?? null;
        } 
    }
?>