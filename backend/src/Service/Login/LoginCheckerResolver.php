<?php
    namespace App\Service\Login;

    use App\Service\Login\LoginDTO\LoginContext;

    use App\Service\Login\LoginVerification\VerificationInterface;
    use App\Entity\UserReg;

    class LoginCheckerResolver
    {
        /** @var iterable<VerificationInterface> */
        public function __construct(private iterable $checkers) {}

        public function check(LoginContext $context): ?UserReg
        {
            foreach ($this -> checkers as $checker) {
                if ($checker -> supports($context)) {
                    return $checker -> check($context);
                }
            }
        }
    }
?>