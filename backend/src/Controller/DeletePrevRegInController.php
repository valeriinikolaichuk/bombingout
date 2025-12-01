<?php
    namespace App\Controller;

    use App\Service\Login\StatusTableLogin\DelPreviousRegService;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\Routing\Annotation\Route;

    class DeletePrevRegInController extends AbstractController {
        #[Route('/api/delPreviousReg', name: 'del_previous_reg', methods: ['POST'])]
        public function deletePrevious(
            Request $request,
            DelPreviousRegService $delPreviousRegService
            ): JsonResponse {

            $data = json_decode($request->getContent(), true);

            $usersId = $data['usersId'] ?? null;
            $usersIp = $data['usersIp'] ?? null;
            $usersAgent = $data['usersAgent'] ?? null;

            if (!$usersId || !$usersIp || !$usersAgent) {
                return new JsonResponse([
                    'success' => false,
                    'message' => 'Missing required data'
                ]);
            }

            $delPreviousRegService -> deleteEntry($usersId, $usersIp, $usersAgent);

            return new JsonResponse(['success' => true]);
        }
    }
?>