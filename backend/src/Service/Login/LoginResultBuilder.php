<?php
    namespace App\Service\Login;

    use App\Service\Login\Result\ResultFillerInterface;
    use App\Service\Login\LoginDTO\LoginContext;
    use App\Service\Login\LoginDTO\LoginResultDTO;
    use App\Entity\UserReg;

    class LoginResultBuilder
    {
        /** @var ResultFillerInterface[] */
        public function __construct(private iterable $fillers) {}

        public function build(
            ?UserReg $user,
            LoginContext $context
            ): LoginResultDTO {

            $result = new LoginResultDTO();

            foreach ($this -> fillers as $filler) {
                if ($filler -> supports($user, $context)) {
                    $filler -> fill($result, $user, $context);
                }
            }

            return $result;
        }
    }
?>