<?php
    namespace App\Controller;

    use App\Service\Login\LoginFactory;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\Routing\Annotation\Route;

    class LoginController extends AbstractController {
        #[Route('/api/login', name: 'login', methods: ['POST'])]
        public function login(
            LoginFactory $factory,
            Request $request
            ): JsonResponse {

            $result = $factory -> loginMethod($request);

            return new JsonResponse(
                $result -> toArray()
            );
        }
    }
?>