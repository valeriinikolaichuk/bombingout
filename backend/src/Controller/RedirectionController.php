<?php
    namespace App\Controller;

    use App\Repository\UserRegRepository;
    use App\Service\Login;
    use App\Service\CheckUserInTable;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;
    use Symfony\Component\Routing\Annotation\Route;

    class RedirectionController extends AbstractController {
        #[Route('/api/login', name: 'login', methods: ['POST'])]
        public function login(
            UserRegRepository $userRepo,
            Login $loginService,
            CheckUserInTable $checker,
            Request $request,
            SessionInterface $session
            ): JsonResponse {

            $data = json_decode($request -> getContent(), true);
            $loginData = $data['login'] ?? null;
            $password = $data['password'] ?? null;
            $language = $data['language'] ?? 'en';

            $user = $userRepo -> findOneBy(['username' => $loginData]);

            if (!$user || !password_verify($password, $user -> getPassword())) {
                $session -> clear();
                return new JsonResponse([
                    'success' => false,
                    'message' => 'login or password is not correct'
                ]);
            }

            $ip = $request -> getClientIp();
            $agent = $request -> headers -> get('User-Agent');

            if ($checker -> existsForUser($user->getId(), $ip, $agent)) {
                return new JsonResponse([
                    'success' => false, 
                    'message' => 'You are already logged in from this browser.'
                ]);
            }

            $loginService -> loginUser($session, $user, $language, $ip, $agent);
            return new JsonResponse(['success' => true]);
        }    
    }
?>