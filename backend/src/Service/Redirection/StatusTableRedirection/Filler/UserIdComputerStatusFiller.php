<?php
    namespace App\Service\Redirection\StatusTableRedirection\Filler;

    use App\Service\Redirection\StatusTableRedirection\ComputerStatusContext;

    use Symfony\Component\HttpFoundation\Request;

    class UserIdComputerStatusFiller implements ComputerStatusFillerInterface
    {
        public function supports(Request $request): bool
        {
            $json = json_decode($request->getContent(), true);

            return isset($json['id_user']) ||
                $request -> query ->has('id_user') ||
                $request -> request ->has('id_user');
        }

        public function fill(ComputerStatusContext $context, Request $request): void
        {
            $json = json_decode($request->getContent(), true) ?: [];

            $context -> userId =
                $json['id_user']
                ?? $request -> request ->get('id_user')
                ?? $request -> query ->get('id_user');

            $context -> userId = (int) $context -> userId;
            $context -> comp_status = 'admin';

            $context -> valid = $context -> userId;
        }
    }
?>