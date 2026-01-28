<?php
    namespace App\Service\GoBack\GoBackFiller;

    use App\Service\GoBack\GoBackDTO\GoBackContext;

    use Symfony\Component\HttpFoundation\Request;

    class RedirectPageData implements GoBackFillerInterface
    {
        public function supports(Request $request): bool
        {
            $data = json_decode($request -> getContent(), true);

            return $data['type'] === 'redirect';
        }

        public function fill(GoBackContext $context, Request $request): void
        {
            $data = json_decode($request -> getContent(), true);

            $context -> usersId = (int)$data['id_user'];
            $context -> status = strval($data['status']);
            $context -> id_status = (int)$data['id_status'];
            $context -> language = $data['lang'];
            $context -> page = $data['type'];
        }
    }
?>