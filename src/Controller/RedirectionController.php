<?php
    namespace App\Controller;

    use App\Repository\UserRegRepository;
    use App\Service\ModelsJavascript\Login;
    use App\Service\CheckInTable;
    use App\Service\ModelsJavascript\redirectionModels\CheckSession;
//    use App\Service\ModelsJavascript\CheckSession;

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

        #[Route('/api/check_session', methods: ['POST'])]
        public function checkSession(
            Request $request, 
            CheckSession $checkSession): JsonResponse {

            $data = json_decode($request -> getContent(), true);

            $idUser = (int)$data['id_user'];
            $idStatus = (int)$data['id_status'];

            $old_sessions = $checkSession -> checkSession($idUser, $idStatus);

            $previousClient = [];
            if (!empty($old_sessions)){
                $previousClient['id_status'] = $old_sessions['id_status'];
                $previousClient['lang'] = $old_sessions['lang'];
            }

            return $this -> json($previousClient);
        }
/*
        #[Route('/api/changeLanguage', methods: ['POST'])]
        public function change_language(
            Request $request, 
            CheckSession $checkSession): JsonResponse {

            $data = json_decode($request -> getContent(), true);*/
    }
?>