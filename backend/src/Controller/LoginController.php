<?php
    namespace App\Controller;

use App\Service\Login\LoginRequestDTO;
use App\Service\Login\LoginService;



//    use App\Repository\UserRegRepository;
//    use App\Service\Login\LoginInterface;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
//    use Symfony\Component\HttpFoundation\Session\SessionInterface;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\Routing\Annotation\Route;

    class LoginController extends AbstractController {
        #[Route('/api/login', name: 'login', methods: ['POST'])]
        #[Route('/api/login_redirect', name: 'login_redirect', methods: ['POST'])]
        public function login(
//            UserRegRepository $userRepo,
//            LoginInterface $loginStrategy,
            Request $request,
//            SessionInterface $session
LoginService $loginService
            ): JsonResponse {

$dto = LoginRequestDTO::fromRequest($request);

            $data = json_decode($request -> getContent(), true);

            $loginData = $data['login'] ?? null;
            $password = $data['password'] ?? null;
            $language = $data['language'] ?? 'en';

            $user = $userRepo -> checkLogin($loginData, $password);

            if (!$user) {
                $session -> clear();

                return new JsonResponse([
                    'success' => false,
                    'message' => 'login or password is not correct'
                ]);
            }

            $ip = $request -> getClientIp();
            $agent = $request -> headers -> get('User-Agent');

            $result = $loginStrategy -> login($session, $user, $language, $ip, $agent);

            return new JsonResponse($result);
        }
    }
?>