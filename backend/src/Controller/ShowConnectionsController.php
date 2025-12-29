<?php
    namespace App\Controller;

    use App\Service\ShowConnections\UserDataFactory;
    use App\Service\ShowConnections\ConnectionsFactory;
    use App\Service\ShowConnections\ShowConnectionsPresenter;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\Routing\Annotation\Route;

    class ShowConnectionsController extends AbstractController {
        #[Route('/api/showConnections', name: 'show_connections', methods: ['POST'])]
        public function showConnections(
            Request $request,
            UserDataFactory $factory,
            ConnectionsFactory $service,
            ShowConnectionsPresenter $presenter
            ): JsonResponse {

            $usersData = $factory -> getUsersData($request);
            $result = $service -> getConnections($usersData);

            return new JsonResponse(
                $presenter -> success($result)
            );
        }
    }
?>