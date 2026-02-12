<?php
    namespace App\Controller\Admin;

    use App\Service\Admin\MainPage\Competition\CompetitionContextBuilder;
    use App\Service\Admin\MainPage\Competition\CompetitionService;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\Routing\Annotation\Route;

    class CompetitionController extends AbstractController {
        #[Route('/api/createCompetition', name: 'createCompetition', methods: ['POST'])]
        public function createCompetition(
            CompetitionContextBuilder $builder,
            CompetitionService $service,
            Request $request
            ): JsonResponse {

            $context = $builder -> build($request);
            $result = $service -> edit($context);

            return new JsonResponse(
                $result -> toArray()
            );
        }
    }
?>