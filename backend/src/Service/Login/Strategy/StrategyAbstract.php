<?php
    namespace App\Service\Login\Strategy;

    use App\Service\Login\LoginCheckerResolver;
    use App\Entity\UserReg;
    use App\Service\Login\LoginDTO\LoginContext;
    use App\Service\Login\LoginDTO\LoginResultDTO;

    abstract class StrategyAbstract
    {
        public function __construct(private LoginCheckerResolver $checkerResolver) {}

        protected function login(LoginContext $context): ?UserReg 
        {
            return $this -> checkerResolver -> check($context);
        }

        abstract public function supports(LoginContext $context): bool;

        abstract public function strategy(LoginContext $context): LoginResultDTO;       
    }
?>