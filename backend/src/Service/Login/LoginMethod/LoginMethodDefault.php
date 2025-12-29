<?php
    namespace App\Service\Login\LoginMethod;

    use App\Service\Login\LoginContextBuilder;
    use App\Service\Login\StrategyFactory;
    use App\Service\Login\LoginCompleted;
    use App\Service\Login\LoginDTO\LoginResultDTO;
    use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\VarDumper\VarDumper;
    class LoginMethodDefault implements LoginMethodInterface
    {
        public function __construct(
            private LoginContextBuilder $contextBuilder,
            private StrategyFactory $factory,
            private LoginCompleted $loginCompleted
        ) {}

        public function supports(Request $request): bool
        {
            $data = json_decode($request -> getContent(), true);

            return
                isset($data['loginMethod']) && 
                $data['loginMethod'] === 'default';
        }

        public function getMethod(Request $request): LoginResultDTO
        {
            $context = $this -> contextBuilder -> build($request);

            $loginResult = $this -> factory -> chooseStrategy($context);

            $result = $this -> loginCompleted -> loginCompletedActions($loginResult);
//dd($result);
            return $result;
        }
    }
?>