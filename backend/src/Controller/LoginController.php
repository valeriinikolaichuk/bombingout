<?php
    namespace App\Controller;

//    use App\Service\Login\LoginContextBuilder;
//    use App\Service\Login\LoginFactory;
//    use App\Repository\UserRegRepository;
use App\Service\Login\LoginByRequestFactory;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\Routing\Annotation\Route;

    class LoginController extends AbstractController {
        #[Route('/api/login', name: 'login', methods: ['POST'])]
//        #[Route('/api/login_redirect', name: 'login_redirect', methods: ['POST'])]
        public function login(
//            LoginContextBuilder $contextBuilder,
//            LoginFactory $postLoginFactory,
//            UserRegRepository $userRepo,
            Request $request,
LoginByRequestFactory $factory
            ): JsonResponse {

            $login = $factory -> getByRequest($request);
            $result = $login -> loginByRequest($request);

            if ($result['success'] === false) {
                return new JsonResponse($result);
            }

            $postLoginResult = $postLoginStrategy->handle($user, $result);

return new JsonResponse($postLoginResult);
/*
            $postLoginStrategy = $postLoginFactory -> get();

            return new JsonResponse(
                $postLoginStrategy -> login($context)
            );
*/


//            $context = $contextBuilder -> build($request);
//            $context -> user = $userRepo -> checkLogin($context -> login, $context -> password);
/*
            if (!$context -> user){
                return new JsonResponse([
                    'success' => false,
                    'message' => 'login or password is not correct'
                ]);
            }
*/
/*            $loginStrategy = $factory -> get();
            return new JsonResponse(
                $loginStrategy -> login($context)
            );*/


/*
            return new JsonResponse(
                $loginByRequest -> loginByRequest($request)
            );*/
        }
    }
?>