<?php
    namespace App\Service\Login;

    use App\Service\Login\LoginByRequest\Filler\ContextFillerInterface;

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