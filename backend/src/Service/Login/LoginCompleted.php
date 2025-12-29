<?php
    namespace App\Service\Login;

    use App\Service\Login\LoginCompleted\LoginCompletedInterface;
    use App\Service\Login\LoginDTO\LoginResultDTO;

    class LoginCompleted 
    {
        /** @var iterable<LoginCompletedInterface> */
        public function __construct(private iterable $postLoginActions) {}

        public function postLoginProcessor(LoginResultDTO $context): LoginResultDTO
        {
            $result = $context;

            if (!$result -> success) {
                return $result;
            }

            foreach ($this -> postLoginActions as $action) {
                if ($action -> supports($result)) {
                    $result = $action -> actions($result);
                }
            }

            return $result;
        }
    }
?>