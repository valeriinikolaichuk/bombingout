<?php
    namespace App\Controller;

    use App\Service\Login\StatusTableLogin\DeletePrevRegContextBuilder;
    use App\Service\Login\StatusTableLogin\DelPreviousRegService;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\Routing\Annotation\Route;

    class DeletePrevRegInController extends AbstractController {
        #[Route('/api/delPreviousReg', name: 'del_previous_reg', methods: ['POST'])]
        public function deletePrevious(
            Request $request,
            DeletePrevRegContextBuilder $builder,
            DelPreviousRegService $delService
            ): JsonResponse {

            $context = $builder -> build($request);

            if (!$context -> valid){
                return new JsonResponse([
                    'success' => false,
                    'message' => 'Missing required data'
                ]);
            }

            $delService -> deleteEntry($context);

            return new JsonResponse(['success' => true]);
        }
    }
?>