<?php
    namespace App\Controller;

    use App\Service\DeleteConnection\DeleteConnectionContextBuilder;
    use App\Service\DeleteConnection\DeleteConnectionChecker;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\Routing\Annotation\Route;

    class DeleteConnectionController extends AbstractController {
        #[Route('/api/deleteConnection', name: 'delete_connection', methods: ['POST'])]
        public function deletePrevious(
            Request $request,
            DeleteConnectionContextBuilder $builder,
            DeleteConnectionChecker $delService
            ): JsonResponse {

            $context = $builder -> build($request);
            $result = $delService -> deleteEntry($context);

            return new JsonResponse($result);
        }
    }
?>