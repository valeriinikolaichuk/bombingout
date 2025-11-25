<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\Routing\Annotation\Route;

    class ShowConnectionsController extends AbstractController {
        #[Route('/api/showConnections', name: 'show_connections', methods: ['POST'])]
        public function showConnections(
            Request $request
        ): JsonResponse {
            $data = json_decode($request -> getContent(), true);

            $id_user = $data['id_user'];

            
        }
    }
?>