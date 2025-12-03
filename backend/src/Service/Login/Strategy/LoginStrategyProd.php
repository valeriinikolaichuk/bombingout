<?php
    namespace App\Service\Login\Strategy;

    use App\Service\Login\LoginContext;
    use App\Service\Login\LoginService;
    use App\Service\Login\StatusTableLogin\CheckUserInTable;

    use Symfony\Component\HttpFoundation\Request;

    class LoginStrategyProd implements LoginInterface {
        public function __construct(
            private CheckUserInTable $checker,
            private LoginService $loginService
        ) {}

        public function supports(Request $request): bool
        {
            return true;
        }

        public function login(LoginContext $context): array {
            $user  = $context -> user;
            $ip    = $context -> ip;
            $agent = $context -> agent;

            if ($this -> checker -> existsForUser($user -> getId(), $ip, $agent)) {
                return [
                    'success' => false,
                    'message' => 'You are already logged in from this browser',
                    'id'      => $user -> getId(),
                    'ip'      => $ip,
                    'agent'   => $agent
                ];
            }

            $this -> loginService -> loginUser($context);

            return [
                'success' => true,
                'message' => 'Logged in successfully'
            ];
        }
    }
?>