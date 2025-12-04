<?php
    namespace App\Service\Login\StatusTableLogin;

    use Symfony\Component\HttpFoundation\Request;
    use App\Service\Login\StatusTableLogin\DeletePrevRegFiller\DeletePrevRegFillerInterface;

    class DeletePrevRegContextBuilder
    {
        /** @var DeletePrevRegFillerInterface[] */
        public function __construct(private iterable $fillers) {}

        public function build(Request $request): DeletePrevRegContext
        {
            $context = new DeletePrevRegContext();

            foreach ($this -> fillers as $filler) {
                if ($filler -> supports($request)) {
                    $filler -> fill($context, $request);
                }
            }

            return $context;
        }
    }
?>