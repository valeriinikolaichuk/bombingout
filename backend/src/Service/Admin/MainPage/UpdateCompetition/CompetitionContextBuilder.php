<?php
    namespace App\Service\Admin\MainPage\UpdateCompetition;

    use App\Service\Admin\MainPage\UpdateCompetition\CompetitionDTO\CompetitionContext;
    use App\Service\Admin\MainPage\UpdateCompetition\Filler\CompetitionFillerInterface;

    class CompetitionContextBuilder
    {
        /** @var CompetitionFillerInterface[] */
        public function __construct(private iterable $fillersComp) {}

        public function build(array $data): CompetitionContext
        {
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