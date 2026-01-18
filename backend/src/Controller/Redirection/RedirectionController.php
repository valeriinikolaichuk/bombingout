<?php
    namespace App\Controller\Redirection;

    use App\Service\Redirection\PageActionFactory;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class RedirectionController extends AbstractController {
        #[Route('/redirect', name: 'redirection', methods: ['POST'])]
        public function redirectToPage(
            Request $request,
            PageActionFactory $factory
        ): Response {

            $action = $request -> request ->get('action');

            $result = $factory -> handle($action);

            return $this ->redirectToRoute($result);
        }
    }
?>