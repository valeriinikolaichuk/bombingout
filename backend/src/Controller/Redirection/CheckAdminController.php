<?php
    namespace App\Controller\Redirection;

    use App\Service\Redirection\CheckAdmin\CheckAdminContextBuilder;
    use App\Service\Redirection\CheckAdmin\AdminChecker;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\Routing\Annotation\Route;

    class CheckAdminController extends AbstractController
    {
        #[Route('/api/check_admin', name: 'check_admin', methods: ['POST'])]
        public function checkStatus(
            CheckAdminContextBuilder $builder,
            AdminChecker $checker,
            Request $request 
            ): JsonResponse {

            $context = $builder -> build($request);

            if (!$context -> valid){
                return new JsonResponse([
                    'status' => 'Missing required data'
                ], 400);
            }

            $isStatus = $checker -> isStatus($context);

            return new JsonResponse([
                'status' => $isStatus ? 'found' : 'not found'
            ]);
        }
    }
?>