<?php
    namespace App\Service\Redirection\StatusTableRedirection;

    use App\Service\Redirection\StatusTableRedirection\Filler\ComputerStatusFillerInterface;

    use Symfony\Component\HttpFoundation\Request;

    class ComputerStatusContextBuilder
    {
        /** @var ComputerStatusFillerInterface[] */
        public function __construct(private iterable $fillers) {}

        public function build(Request $request): ComputerStatusContext
        {
            $context = new ComputerStatusContext();

            foreach ($this -> fillers as $filler){
                if ($filler -> supports($request)){
                    $filler -> fill($context, $request);
                }
            }

            return $context;
        }
    }
?>