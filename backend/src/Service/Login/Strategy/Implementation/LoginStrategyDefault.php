<?php
    namespace App\Service\Login\Strategy\Implementation;

    use App\Service\Login\Strategy\StrategyAbstract;
    use App\Service\Login\LoginCheckerResolver;
    use App\Service\Login\LoginResultBuilder;
    use App\Service\Login\Strategy\LoginPolicyResolver;
    use App\Service\Login\LoginDTO\LoginContext;
    use App\Service\Login\LoginDTO\LoginResultDTO;

    class LoginStrategyDefault extends StrategyAbstract 
    {
        public function __construct(
            LoginCheckerResolver $checkerResolver,
            private LoginResultBuilder $resultFactory, 
            private LoginPolicyResolver $policyResolver
        ) {
            parent::__construct($checkerResolver);
        }

        public function supports(LoginContext $context): bool
        {
            return $context -> loginMethod === 'default';
        }

        public function strategy(LoginContext $context): LoginResultDTO
        { 
            if ($policyResult = $this -> policyResolver -> check($context)) {
                return $policyResult;
            }

            $user = $this -> login($context);

            return $this -> resultFactory -> build(
                    $user,
                    $context
                );
        }
    }
?>