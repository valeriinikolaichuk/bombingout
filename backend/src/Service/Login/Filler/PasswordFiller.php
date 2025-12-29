<?php
    namespace App\Service\Login\Filler;

    use App\Service\Login\LoginDTO\LoginContext;

    use Symfony\Component\HttpFoundation\Request;

    class PasswordFiller implements ContextFillerInterface
    {
        public function supports(Request $request): bool
        {
            return true;
        }

        public function fill(LoginContext $context, Request $request): void
        {
            $data = json_decode($request -> getContent(), true);

            $context -> password = $data['password'] ?? null;
        } 
    }
?>