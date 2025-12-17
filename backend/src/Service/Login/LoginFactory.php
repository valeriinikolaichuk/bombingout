<?php
    namespace App\Service\Login;

    use App\Service\Login\LoginMethod\LoginMethodInterface;
    use App\Service\Login\LoginDTO\LoginResultDTO;

    use Symfony\Component\HttpFoundation\Request;

    class LoginFactory
    {
        /** @var iterable<LoginMethodInterface> */
        public function __construct(private iterable $checkers) {}

        public function loginMethod(Request $request): LoginResultDTO
        {
            foreach ($this -> checkers as $checker) {
                if ($checker -> supports($request)) {
                    return $checker -> getMethod($request);
                }
            }
        }
    }
?>