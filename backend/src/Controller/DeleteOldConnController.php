<?php
    namespace App\Controller;

    use App\Repository\DeleteOldConnectionsRepository;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\Routing\Annotation\Route;

    class DeleteOldConnController extends AbstractController {
        #[Route('/api/delete_old_connections', name: 'delete_old_connections', methods: ['POST'])]
        public function deleteOldConnections(
            Request $request,
            DeleteOldConnectionsRepository $deleteOldConnRepo
            ): JsonResponse {

            $data = json_decode($request -> getContent(), true);
            $idUser = $data['id_user'] ?? null;

            if (!$idUser){
                return new JsonResponse([
                    'status' => 'error', 
                    'message' => 'Missing user id'
                ], 400);
            }

            try {
                $deleteOldConnRepo -> deleteOldConnectionsExceptCurrent($idUser);
                return new JsonResponse([
                    'status' => 'ok'
                ]);
            } catch (\Exception $e){
                return new JsonResponse([
                    'status' => 'error', 
                    'message' => $e -> getMessage()
                ], 500);
            }
        }
    }  
?>