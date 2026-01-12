<?php
    namespace App\Service\Redirection\ShowConnections;

    use Symfony\Component\HttpFoundation\Request;

    class ShowConnectionsRequestParser
    {
        public function getUsersData(Request $request): ?int
        {
            $data = json_decode($request -> getContent(), true);

            return isset($data['id_user']) && 
                (int)$data['id_user'] > 0 
                ? (int)$data['id_user'] : null;
        }
    }
?>