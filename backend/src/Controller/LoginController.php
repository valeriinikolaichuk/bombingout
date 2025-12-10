<?php
    namespace App\Controller;

    use App\Service\Login\LoginByRequestFactory;
    use App\Service\Login\PostLoginFactory;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\Routing\Annotation\Route;

    class LoginController extends AbstractController {
        #[Route('/api/login', name: 'login', methods: ['POST'])]
        #[Route('/api/login_redirect', name: 'login_redirect', methods: ['POST'])]
        public function login(
            LoginByRequestFactory $factory,
            PostLoginFactory $postLoginFactory,
            Request $request
            ): JsonResponse {

            $login = $factory -> getByRequest($request);
            $result = $login -> loginByRequest($request);

            if ($result -> success === false) {
                return new JsonResponse([
                    'success' => false,
                    'message' => $result -> message
                ]);
            }

            $postLoginStrategy = $postLoginFactory -> get($request);

            return new JsonResponse(
                $postLoginStrategy -> login($result -> context)
            );
        }
    }
?>