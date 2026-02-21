<?php
    namespace App\Service\Admin\MainPage\GetCompetitionData;

    use App\Service\Admin\MainPage\GetCompetitionData\CompetitionDataDTO\CompetitionDataContext;
    use App\Service\Admin\MainPage\GetCompetitionData\DataFiller\CompetitionDataFillerInterface;

    class CompetitionDataBuilder
    {
        /** @var CompetitionDataFillerInterface[] */
        public function __construct(private iterable $dataFillersComp) {}

        public function build(array $data): CompetitionDataContext
        {
            $context = new CompetitionDataContext();

            foreach ($this -> dataFillersComp as $filler) {
                if ($filler -> supports($data)) {
                    $filler -> fill($data, $context);
                }
            }

            return $context;
        }
    }
?>