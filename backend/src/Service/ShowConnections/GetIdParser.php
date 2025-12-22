<?php
    namespace App\Service\ShowConnections;

    use Symfony\Component\HttpFoundation\Request;

    class GetIdParser {
        public function getUserId(Request $request): ?int
        {
            $data = json_decode($request -> getContent(), true);

            if (!is_array($data)) {
                return null;
            }

            $userId = $data['id_user'] ?? null;

            return is_numeric($userId) && (int)$userId > 0
                ? (int)$userId
                : null;
        }
    }
?>