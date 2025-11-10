<?php
    namespace App\Controller;

    use App\Repository\UserRegRepository;
    use App\Service\ModelsJavascript\Login;
    use App\Service\CheckInTable;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;
    use Symfony\Component\Routing\Annotation\Route;

    class RedirectionController extends AbstractController {
        #[Route('/api/login', name: 'login', methods: ['POST'])]
        public function login(
            Login $login,
            CheckInTable $checkInTable,
            Request $request,
            SessionInterface $session,
            UserRegRepository $userRepo): JsonResponse {

            $data = json_decode($request -> getContent(), true);
            $loginData = $data['login'];
            $password = $data['password'];
            $language = $data['language'];

            $user = $userRepo -> checkLogin($loginData, $password);

            if (!$user){
                $session -> set('error_log_in', '<span style="color: red;">login or password is not correct</span>');
            } else {
                $session -> set('error_log_in', null);
                $login -> setSessionVariables($session, $user, $checkInTable, $language);
            }

            return $this -> json($user);
        }
    }
?>