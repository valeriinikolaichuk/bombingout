<?php
    namespace App\Controller\Admin;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class TableController extends AbstractController {
        #[Route('/tableController', name: 'table', methods: ['GET', 'POST'])]
        public function table(
            Request $request, 
            ): Response {

            $data = json_decode($request -> getContent(), true);
            $type = $data['type'] ?? null;
            $rows = $data['rows'] ?? [];

            return $this->render('clients/components/admin/_main_table.html.twig', [
                'rows'      => $rows,
                'rowNumber' => $rowNumber
            ]);
        }
    }
?>