<?php
    namespace App\Service\DeleteConnection;

    use Symfony\Component\HttpFoundation\Request;

    class DeleteConnectionContextBuilder
    {
        /** @var DeleteConnectionFillerInterface[] */
        public function __construct(private iterable $fillersDel) {}

        public function build(Request $request): DeleteConnectionContext
        {
            $context = new DeleteConnectionContext();

            foreach ($this -> fillersDel as $filler) {
                if ($filler -> supports($request)) {
                    $filler -> fill($context, $request);
                }
            }

            return $context;
        }
    }
?>