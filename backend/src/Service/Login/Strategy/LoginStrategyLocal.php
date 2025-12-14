<?php
    namespace App\Service\Login\Strategy;

    use App\Service\Login\LoginContext;
    use App\Service\Login\LoginResultDTO;

    class LoginStrategyLocal extends StrategyAbstract 
    {
        public function supports(LoginContext $context): bool
        {
            return empty($context -> page)
                && empty($context -> ip)
                && empty($context -> agent);
        }

        public function strategy(LoginContext $context): LoginResultDTO
        {
            $user = $this -> login($context);

            $loginResult = new LoginResultDTO();

            if (!$user){
                $loginResult -> success = false;
                $loginResult -> message = 'login or password is not correct';

                return $loginResult;
            }

            $loginResult -> success = true;
            $loginResult -> context = $context;
            $loginResult -> createSession = 'login';

            return $loginResult;
        }
    }
?>