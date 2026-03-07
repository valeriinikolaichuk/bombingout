<?php
    namespace App\Controller\Admin;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class MainTableController extends AbstractController {
        #[Route('/mainTable', name: 'main_table', methods: ['GET', 'POST'])]
        public function mainTable(
            Request $request, 
            ): Response {

            $data = json_decode($request -> getContent(), true);
            $rows = $data['rows'] ?? [];
            $rowNumber = count($rows);

            return $this->render('clients/components/admin/_main_table.html.twig', [
                'rows'      => $rows,
                'rowNumber' => $rowNumber
            ]);
        }
    }
?>