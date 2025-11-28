<?php
    namespace App\Controller;

    use App\Repository\AdminStatusRepository;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\Routing\Annotation\Route;

    class AdminStatusController extends AbstractController
    {
        #[Route('/api/check_admin', name: 'check_admin', methods: ['POST'])]
        public function checkAdmin(
            Request $request, 
            AdminStatusRepository $repo
            ): JsonResponse {

            $data = json_decode($request -> getContent(), true);
            $users_ID = $data['id_user'] ?? null;

            if (!$users_ID) {
                return new JsonResponse([
                    'success' => false,
                    'message' => 'Missing user id'
                ], 400);
            }

            $status = $repo -> findBy([
                'users_ID'    => $users_ID,
                'comp_status' => 'admin'
            ]);

            if (!$status) {
                return new JsonResponse(['status' => 'not found']);
            }

            return new JsonResponse(['status' => 'found']);
        }
    }
?>