<?php
    namespace App\Controller;

    use App\Repository\UserRegRepository;
    use App\Service\Login\LoginInterface;
    use App\Service\Login\StatusTableLogin\DelPreviousRegService;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\Routing\Annotation\Route;

    class LoginController extends AbstractController {
        #[Route('/api/login', name: 'login', methods: ['POST'])]
        public function login(
            UserRegRepository $userRepo,
            LoginInterface $loginStrategy,
            Request $request,
            SessionInterface $session
            ): JsonResponse {

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
        
        #[Route('/api/delPreviousReg', name: 'del_previous_reg', methods: ['POST'])]
        public function deletePrevious(
            Request $request,
            DelPreviousRegService $delPreviousRegService
            ): JsonResponse {

            $data = json_decode($request->getContent(), true);

            $usersId = $data['usersId'] ?? null;
            $usersIp = $data['usersIp'] ?? null;
            $usersAgent = $data['usersAgent'] ?? null;

            if (!$usersId || !$usersIp || !$usersAgent) {
                return new JsonResponse([
                    'success' => false,
                    'message' => 'Missing required data'
                ]);
            }

            $delPreviousRegService -> deleteEntry($usersId, $usersIp, $usersAgent);

            return new JsonResponse(['success' => true]);
        }
    }
?>