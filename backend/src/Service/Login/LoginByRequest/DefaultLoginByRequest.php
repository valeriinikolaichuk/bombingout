<?php
    namespace App\Service\Login\LoginByRequest;

    use App\Service\Login\LoginContextBuilder;
    use App\Service\Login\LoginPasswordCheckerResolver;

    class DefaultLoginByRequest implements LoginByRequestInterface
    {
        public function __construct(
            private LoginContextBuilder $contextBuilder,
            private LoginPasswordCheckerResolver $checkerResolver
        ) {}

        public function supports(string $type): bool
        {
            return $type === 'default';
        }

        public function loginByRequest(
            Request $request
            ): array {

            $context = $this -> contextBuilder -> build($request);
            $user = $this -> checkerResolver -> check($context);

            if (!$user){
                return new LoginResultDTO(
                    success: false,
                    message: 'login or password is not correct'
                );
            }

            return new LoginResultDTO(
                success: true,
                user: $user,
                context: $context
            );
        }
    }
?>