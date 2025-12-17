<?php
    namespace App\Service\Login;

    use App\Service\Login\Filler\ContextFillerInterface;
    use App\Service\Login\LoginDTO\LoginContext;

    use Symfony\Component\HttpFoundation\Request;

    class LoginContextBuilder
    {
        /** @var ContextFillerInterface[] */
        public function __construct(private iterable $fillers) {}

        public function build(
            Request $request
            ): LoginContext {

            $context = new LoginContext();

            foreach ($this -> fillers as $filler){
                if ($filler -> supports($request)){
                    $filler -> fill($context, $request);
                }
            }

            return $context;
        }
    }
?>