<?php
    namespace App\Controller;

    use App\Service\ShowConnections\GetIdParser;
    use App\Service\ShowConnections\GetAllConnections;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\Routing\Annotation\Route;

    class ShowConnectionsController extends AbstractController {
        #[Route('/api/showConnections', name: 'show_connections', methods: ['POST'])]
        public function showConnections(
            Request $request,
            GetIdParser $parser,
            GetAllConnections $service
            ): JsonResponse {

            $userId = $parser -> getUserId($request);
            $result = $service -> getConnections($userId);

            return new JsonResponse($result);
        }
    }
?>