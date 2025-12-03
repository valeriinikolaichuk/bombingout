<?php
    namespace App\Service\Login\Strategy;

    use App\Service\Login\LoginContext;
    use App\Service\Login\LoginService;

    use Symfony\Component\HttpFoundation\Request;

    class LoginStrategyLocal implements LoginInterface {
        public function __construct(private LoginService $loginService) {}

        public function supports(Request $request): bool
        {
            return $request -> getHost() === 'localhost';
        }

        public function login(LoginContext $context): array
        {
            $this -> loginService -> loginUser($context);

            return [
                'success' => true,
                'message' => 'Logged in successfully'
            ];
        }
    }
?>