<?php
    namespace App\Controller;

    use App\Service\Redirection\StatusTableRedirection\ComputerStatusContextBuilder;
    use App\Service\Redirection\StatusTableRedirection\ComputerStatusChecker;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\Routing\Annotation\Route;

    class ComputerStatusController extends AbstractController
    {
        #[Route('/api/check_computer_status', name: 'check_computer_status', methods: ['POST'])]
        public function checkStatus(
            ComputerStatusContextBuilder $builder,
            ComputerStatusChecker $checker,
            Request $request 
            ): JsonResponse {

            $context = $builder -> build($request);

            if (!$context -> userId) {
                return new JsonResponse([
                    'success' => false,
                    'message' => 'Missing user id'
                ], 400);
            }

            $isStatus = $checker -> isStatus($context);

            return new JsonResponse([
                'status' => $isStatus ? 'found' : 'not found'
            ]);
        }
    }
?>