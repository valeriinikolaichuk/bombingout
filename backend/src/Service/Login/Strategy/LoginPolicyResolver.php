<?php
    namespace App\Service\Login\Strategy;

    use App\Service\Login\Strategy\Policy\LoginPolicyInterface;
    use App\Service\Login\LoginDTO\LoginContext;
    use App\Service\Login\LoginDTO\LoginResultDTO;

    final class LoginPolicyResolver
    {
        /** @var iterable<LoginPolicyInterface> */
        public function __construct(private iterable $policies) {}

        public function check(LoginContext $context): ?LoginResultDTO
        {
            foreach ($this -> policies as $policy) {
                if ($policy -> supports($context)) {
                    $result = $policy -> check($context);
                    if ($result !== null) {
                        return $result;
                    }
                }
            }

            return null;
        }
    }
?>