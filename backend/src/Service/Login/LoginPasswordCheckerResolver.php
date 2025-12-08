<?php
    namespace App\Service\Login;

    use App\Service\Login\LoginPasswordVerification\VerificationInterface;
    use App\Service\Login\Exception\NoVerificationCheckerFound;
    use App\Entity\User;

    class LoginPasswordCheckerResolver
    {
        /** @var iterable<VerificationInterface> */
        public function __construct(private iterable $checkers) {}

        public function check(LoginContext $context): ?User
        {
            foreach ($this -> checkers as $checker) {
                if ($checker -> supports($context)) {
                    return $checker -> check($context);
                }
            }

            throw new NoVerificationCheckerFound('No checker supports this context');
        }
    }
?>