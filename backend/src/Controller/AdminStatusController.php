<?php
    namespace App\Controller;

    use App\Service\Redirection\AdminStatusChecker;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\Routing\Annotation\Route;

    class AdminStatusController extends AbstractController
    {
        #[Route('/api/check_admin', name: 'check_admin', methods: ['POST'])]
        public function checkAdmin(
            Request $request, 
            AdminStatusChecker $checker
            ): JsonResponse {

            $data = json_decode($request -> getContent(), true);
            $users_ID = $data['id_user'] ?? null;

            if (!$users_ID) {
                return new JsonResponse([
                    'success' => false,
                    'message' => 'Missing user id'
                ], 400);
            }

            $isAdmin = $checker -> isAdmin($userId);

            return new JsonResponse([
                'status' => $isAdmin ? 'found' : 'not found'
            ]);
        }
    }
?>