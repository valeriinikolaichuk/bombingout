<?php
    namespace App\Service\Login\Strategy;

    use App\Service\Login\LoginService;
    use App\Service\Login\LoginContext;

    class LoginStrategyLocal implements PostLoginInterface {
        public function __construct(private LoginService $loginService) {}

        public function supports(LoginContext $context): bool
        {
            return empty($context -> page)
                && empty($context -> ip)
                && empty($context -> agent);
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