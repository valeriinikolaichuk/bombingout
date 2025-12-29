<?php
    namespace App\Controller;

    use App\Service\Redirection\ActionFactory;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class RedirectionController extends AbstractController {
        #[Route('/redirect', name: 'redirection', methods: ['POST'])]
        public function redirectToPage(
            Request $request,
            ActionFactory $factory
        ): Response {

            $action = $request -> request ->get('action');

            return $factory -> handle($action, $request);
        }
    }
?>