<?php
    namespace App\Service\GoBack;

    use App\Service\GoBack\GoBackFiller\GoBackFillerInterface;
    use App\Service\GoBack\GoBackDTO\GoBackContext;

    use Symfony\Component\HttpFoundation\Request;

    class GoBackContextBuilder
    {
        /** @var GoBackFillerInterface[] */
        public function __construct(private iterable $fillersGoBack) {}

        public function build(Request $request): GoBackContext
        {
            $context = new GoBackContext();

            foreach ($this -> fillersGoBack as $filler) {
                if ($filler -> supports($request)) {
                    $filler -> fill($context, $request);
                }
            }

            return $context;
        }
    }
?>