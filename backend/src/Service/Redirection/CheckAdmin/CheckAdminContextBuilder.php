<?php
    namespace App\Service\Redirection\CheckAdmin;

    use App\Service\Redirection\CheckAdmin\Filler\CheckAdminFillerInterface;

    use Symfony\Component\HttpFoundation\Request;

    class CheckAdminContextBuilder
    {
        /** @var CheckAdminFillerInterface[] */
        public function __construct(private iterable $fillers) {}

        public function build(Request $request): CheckAdminContext
        {
            $context = new CheckAdminContext();

            foreach ($this -> fillers as $filler){
                if ($filler -> supports($request)){
                    $filler -> fill($context, $request);
                }
            }

            return $context;
        }
    }
?>