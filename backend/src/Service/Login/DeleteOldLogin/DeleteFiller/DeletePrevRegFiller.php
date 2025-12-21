<?php
    namespace App\Service\Login\DeleteOldLogin\DeleteFiller;

    use App\Service\Login\DeleteOldLogin\DeletePrevRegFillerInterface;
    use App\Service\Login\DeleteOldLogin\DeletePrevRegContext;

    use Symfony\Component\HttpFoundation\Request;

    class DeletePrevRegFiller implements DeletePrevRegFillerInterface
    {
        public function supports(Request $request): bool
        {
            $data = json_decode($request -> getContent(), true);

            return isset($data['usersId']) && isset($data['usersIp']) && isset($data['usersAgent']);
        }

        public function fill(DeletePrevRegContext $context, Request $request): void
        {
            $data = json_decode($request -> getContent(), true);

            $context -> usersId    = (int)$data['usersId'];
            $context -> usersIp    = (string)$data['usersIp'];
            $context -> usersAgent = (string)$data['usersAgent'];

            $context -> hasDeleteCriteria = true;
        }
    }
?>