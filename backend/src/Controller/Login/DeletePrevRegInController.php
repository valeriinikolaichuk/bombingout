<?php
    namespace App\Controller\Login;

    use App\Service\Login\DeleteOldLogin\DeletePrevRegContextBuilder;
    use App\Service\Login\DeleteOldLogin\DeletePrevRegChecker;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\Routing\Annotation\Route;

    class DeletePrevRegInController extends AbstractController {
        #[Route('/api/delPreviousReg', name: 'del_previous_reg', methods: ['POST'])]
        public function deletePrevious(
            Request $request,
            DeletePrevRegContextBuilder $builder,
            DeletePrevRegChecker $delService
            ): JsonResponse {

            $context = $builder -> build($request);
            $result = $delService -> deleteEntry($context);

            return new JsonResponse($result);
        }
    }
?>