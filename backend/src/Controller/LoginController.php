<?php
    namespace App\Controller;

    use App\Service\Login\LoginContextBuilder;
    use App\Service\Login\LoginFactory;
    use App\Repository\UserRegRepository;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\Routing\Annotation\Route;

    class LoginController extends AbstractController {
        #[Route('/api/login', name: 'login', methods: ['POST'])]
        #[Route('/api/login_redirect', name: 'login_redirect', methods: ['POST'])]
        public function login(
            LoginContextBuilder $contextBuilder,
            LoginFactory $factory,
            UserRegRepository $userRepo,
            Request $request
            ): JsonResponse {

            $context = $contextBuilder -> build($request);
            $context -> user = $userRepo -> checkLogin($context -> login, $context -> password);

            if (!$context -> user){
                return new JsonResponse([
                    'success' => false,
                    'message' => 'login or password is not correct'
                ]);
            }

            $loginStrategy = $factory -> get();
            return new JsonResponse(
                $loginStrategy -> login($context)
            );
        }
    }
?>