<?php
    namespace App\Service\Admin\MainPage\Competition;

    use Symfony\Component\HttpFoundation\Request;

    use App\Service\Admin\MainPage\Competition\CompetitionDTO\CompetitionContext;
    use App\Service\Admin\MainPage\Competition\Filler\CompetitionFillerInterface;

    class CompetitionContextBuilder
    {
        /** @var CompetitionFillerInterface[] */
        public function __construct(private iterable $fillersComp) {}

        public function build(Request $request): CompetitionContext
        {
            $data = json_decode($request -> getContent(), true);

            $context = new CompetitionContext();

            foreach ($this -> fillersComp as $filler) {
                if ($filler -> supports($data)) {
                    $filler -> fill($data, $context);
                }
            }

            return $context;
        }
    }
?>