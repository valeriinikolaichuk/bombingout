<?php
    namespace App\MessageHandler;

    use App\Message\CompetitionCreatedMessage;
    use Symfony\Component\Messenger\Attribute\AsMessageHandler;
    use Ramsey\Uuid\Uuid;

    #[AsMessageHandler]
    class CompetitionCreatedHandler
    {
        public function __invoke(CompetitionCreatedMessage $message)
        {
            $this -> client ->request(
                'POST',
                'http://node_app:4000/admin-update',
                [
                    'json' => [
                        'event'            => 'competition_created',
                        'payload' => [
                            'comp_id'          => $message -> comp_id,
                            'users_id'         => $message -> user,
                            'competition_name' => $message -> competition_name,
                            'country'          => $message -> country,
                            'city'             => $message -> city,
                            'start_date'       => $message -> start_date?->format('Y-m-d'),
                            'end_date'         => $message -> end_date?->format('Y-m-d'),
                            'division'         => $message -> division,
                            'sex'              => $message -> sex,
                            'age_group'        => $message -> age_group,
                            'type'             => $message -> type,
                            'version'          => $message -> version,
                            'nomination'       => null,
                            'preliminary'      => null,
                            'final'            => null,
                            'event_id'         => Uuid::uuid4()->toString()
                        ]
                    ]
                ]
            );
        }
    }
?>