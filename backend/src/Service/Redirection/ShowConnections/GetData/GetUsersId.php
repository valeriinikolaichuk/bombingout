<?php
    namespace App\Service\Redirection\ShowConnections\GetData;

    use App\Service\Redirection\ShowConnections\UserDataDTO;

    use Symfony\Component\HttpFoundation\Request;

    class GetUsersId implements GetDataInterface
    {
        public function supports(Request $request): bool
        {
            $data = json_decode($request->getContent(), true);

            if (!is_array($data)) {
                return false;
            }

            return isset($data['id_user']) && is_numeric($data['id_user']);
        }

        public function getData(UserDataDTO $context, Request $request): void
        {
            $data = json_decode($request->getContent(), true);

            $userId = $data['id_user'] ?? null;
            $context -> usersId = (int)$userId;
        }
    }
?>