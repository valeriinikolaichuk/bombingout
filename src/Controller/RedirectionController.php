<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;
    use Symfony\Component\Routing\Annotation\Route;

    class RedirectionController extends AbstractController {
        #[Route('/api/login', name: 'login', methods: ['POST'])]
        public function login(
            LoginService $loginService,
            Request $request,
            SessionInterface $session): JsonResponse {

            $data = json_decode($request -> getContent(), true);
            $show = $login -> checkLogin($data);
            $language = $data['language'];
            $login -> set_session_variables($show, $language);

            return $this -> json($show);
        }
    }
?>