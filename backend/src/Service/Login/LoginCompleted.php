<?php
    namespace App\Service\Login;

    use App\Service\Login\LoginCompleted\LoginCompletedInterface;
    use App\Service\Login\LoginDTO\LoginResultDTO;

    class LoginCompleted 
    {
        /** @var iterable<LoginCompletedInterface> */
        public function __construct(private iterable $postLoginActions) {}

        public function loginCompletedActions(LoginResultDTO $context): LoginResultDTO
        {
            if (!$context -> success) {
                return $context;
            }

            foreach ($this -> postLoginActions as $action) {
                if ($action -> supports($context)) {
                    $result = $action -> actions($context);
                }
            }

            return $result;
        }
    }
?>