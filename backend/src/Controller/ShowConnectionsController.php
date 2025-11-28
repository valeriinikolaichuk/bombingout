<?php
    namespace App\Controller;

    use App\Repository\ShowConnectionsRepository;
    use App\Repository\DeleteOldConnectionsRepository;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\Routing\Annotation\Route;

    class ShowConnectionsController extends AbstractController {
        #[Route('/api/showConnections', name: 'show_connections', methods: ['POST'])]
        public function showConnections(
            Request $request,
            ShowConnectionsRepository $repo
            ): JsonResponse {

            $data = json_decode($request -> getContent(), true);
            $id_user = $data['id_user'] ?? null;

            if (!$id_user) {
                return new JsonResponse([
                    'success' => false,
                    'message' => 'A connection is required. Please log in again.'
                ]);
            }

            $connections = $repo -> getConnectionsByUser((int)$id_user);

            return new JsonResponse([
                'success' => true,
                'connections' => $connections,
                'count' => count($connections)
            ]);
        }

        #[Route('/api/delete_old_connections', name: 'delete_old_connections', methods: ['POST'])]
        public function deleteOldConnections(
            Request $request,
            DeleteOldConnectionsRepository $deleteOldConnRepo
            ): JsonResponse {

            $data = json_decode($request -> getContent(), true);
            $idUser = $data['id_user'] ?? null;
            $currentIp = $request -> getClientIp();
            $userAgent = $request -> headers -> get('User-Agent');

            if (!$idUser) {
                return new JsonResponse([
                    'status' => 'error', 
                    'message' => 'Missing user id'
                ], 400);
            }

            try {
                $deleteOldConnRepo -> deleteOldConnectionsExceptCurrent($idUser, $currentIp, $userAgent);
                return new JsonResponse([
                    'status' => 'ok'
                ]);
            } catch (\Exception $e) {
                return new JsonResponse([
                    'status' => 'error', 
                    'message' => $e -> getMessage()
                ], 500);
            }
        }    
    }
?>