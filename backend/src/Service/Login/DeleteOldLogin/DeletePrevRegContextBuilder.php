<?php
    namespace App\Service\Login\DeleteOldLogin;

    use Symfony\Component\HttpFoundation\Request;

    class DeletePrevRegContextBuilder
    {
        /** @var DeletePrevRegFillerInterface[] */
        public function __construct(private iterable $fillersDel) {}

        public function build(Request $request): DeletePrevRegContext
        {
            $context = new DeletePrevRegContext();

            foreach ($this -> fillersDel as $filler) {
                if ($filler -> supports($request)) {
                    $filler -> fill($context, $request);
                    break;
                }
            }

            return $context;
        }
    }
?>