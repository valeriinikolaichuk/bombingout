<?php
    namespace App\Controller;

    use App\Service\Redirection\ComputerStatusChecker;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\Routing\Annotation\Route;

    class ComputerStatusController extends AbstractController
    {
        #[Route('/api/check_computer_status', name: 'check_computer_status', methods: ['POST'])]
        public function checkStatus(
            Request $request, 
            ComputerStatusChecker $checker
            ): JsonResponse {

            $data = json_decode($request -> getContent(), true);
            $users_ID = $data['id_user'] ?? null;

            if (!$users_ID) {
                return new JsonResponse([
                    'success' => false,
                    'message' => 'Missing user id'
                ], 400);
            }

            $isStatus = $checker -> isStatus($userId);

            return new JsonResponse([
                'status' => $isStatus ? 'found' : 'not found'
            ]);
        }
    }
?>