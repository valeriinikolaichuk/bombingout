<?php
    namespace App\Controller;

    use App\Service\GoBack\GoBackContextBuilder;
    use App\Service\GoBack\GoBackFactory;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\Routing\Annotation\Route;

   class GoBackController extends AbstractController {
        #[Route('/api/goBackToPage', name: 'go_back_to_page', methods: ['POST'], format: 'json')]
        public function goBack(
            Request $request,
            GoBackContextBuilder $builder,
            GoBackFactory $factory
            ): JsonResponse {

            $context = $builder -> build($request);

            $result = $factory -> goBackAction($context);

            return new JsonResponse(
                $result -> toArray()
            );
        }
    }
?>