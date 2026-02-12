<?php
    namespace  App\Service\Admin\MainPage\Competition\Result;

    use Doctrine\DBAL\Connection;
    use Doctrine\DBAL\ParameterType;

    use App\Service\Admin\MainPage\Competition\CompetitionDTO\CompetitionContext;
    use App\Service\Admin\MainPage\Competition\CompetitionDTO\ResultDTO;

    class CompetitionDataWriter implements CompetitionResultInterface
    {
        public function __construct(private Connection $db) {}

        public function supports(CompetitionContext $context): bool
        {
            return $context -> popupType === 'create' 
                && $context -> comp_id === null;
        }

        public function execute(CompetitionContext $context, ResultDTO $result): void
        {
            $usersId = $context -> usersId ?? 0;
            $competitionName = $context -> competition_name ?? null;
            $country = $context -> country ?? null;
            $city = $context -> city ?? null;
            $startDate = $context -> start_date ?? null;
            $endDate = $context -> end_date ?? null;
            $division = $context -> division ?? null;
            $sex = $context -> sex ?? null;
            $ageGroup = $context -> age_group ?? null;
            $type = $context -> type ?? null;
            $version = $context -> version ?? null;

            $this -> db -> executeStatement(
                "INSERT INTO competitions (users_id, competition_name, country, city, start_date,
                    end_date, division, age_group, sex, type, categories)
                 VALUES (:id_user, :competition_name, :country, :city, :startDate, :endDate, 
                    :division, :age_group, :sex, :compType, :categories)",
                [
                    'id_user'          => $usersId,
                    'competition_name' => $competitionName,
                    'country'          => $country,
                    'city'             => $city,
                    'startDate'        => $startDate,
                    'endDate'          => $endDate,
                    'division'         => $division,
                    'age_group'        => $ageGroup,
                    'sex'              => $sex,
                    'compType'         => $type,
                    'categories'       => $version
                ],
                [
                    'id_user'          => ParameterType::INTEGER,
                    'competition_name' => ParameterType::STRING,
                    'country'          => ParameterType::STRING,
                    'city'             => ParameterType::STRING,
                    'startDate'        => ParameterType::DATE_MUTABLE,
                    'endDate'          => ParameterType::DATE_MUTABLE,
                    'division'         => ParameterType::STRING,
                    'age_group'        => ParameterType::STRING,
                    'sex'              => ParameterType::STRING,
                    'compType'         => ParameterType::STRING,
                    'categories'       => ParameterType::STRING
                ]
            );

            $result -> comp_id = (int) $this -> db -> lastInsertId();
            $context -> comp_id = $result -> comp_id;
        }
    }
?>