<?php
    namespace App\Controller;

    use App\Service\Redirection\RedirectionFactory;
    use App\Service\Redirection\AddStatusToTable;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;
    use Symfony\Component\Routing\Annotation\Route;

    class RedirectionController extends AbstractController {
        #[Route('/redirect', name: 'redirection', methods: ['POST'])]
        public function redirect(
            Request $request,
            SessionInterface $session,
            AddStatusToTable $addStatusToTable
            ): Response {

            if ($request -> request -> has('comp_status')) {
                $key = $request -> request -> get('comp_status');
                $idStatus = $session -> get('id_status');

                $addStatusToTable -> updateStatus($key, (int)$idStatus);

                try {
                    $page = RedirectionFactory::create($key);
                    $template = $page -> render();
                    return $this -> render($template);
                } catch (\InvalidArgumentException $e) {
                    return new Response($e->getMessage(), 404);
                }
            }
        }
    }
?>