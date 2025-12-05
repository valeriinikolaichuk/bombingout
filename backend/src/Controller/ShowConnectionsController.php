<?php
    namespace App\Controller;

    use App\Repository\ShowConnectionsRepository;

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

            if (!$id_user){
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
    }
?>