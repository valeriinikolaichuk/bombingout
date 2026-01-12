<?php
    namespace App\Service\Redirection\CheckAdmin\Filler;

    use App\Service\Redirection\CheckAdmin\CheckAdminContext;

    use Symfony\Component\HttpFoundation\Request;

    class UserIdCheckAdminFiller implements CheckAdminFillerInterface
    {
        public function supports(Request $request): bool
        {
            $json = json_decode($request->getContent(), true);

            return isset($json['id_user']) ||
                $request -> query ->has('id_user') ||
                $request -> request ->has('id_user');
        }

        public function fill(CheckAdminContext $context, Request $request): void
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