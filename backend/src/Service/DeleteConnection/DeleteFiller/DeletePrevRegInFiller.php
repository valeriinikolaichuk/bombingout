<?php
    namespace App\Service\DeleteConnection\DeleteFiller;

    use App\Service\DeleteConnection\DeleteConnectionFillerInterface;
    use App\Service\DeleteConnection\DeleteConnectionContext;

    use Symfony\Component\HttpFoundation\Request;

    class DeletePrevRegInFiller implements DeleteConnectionFillerInterface
    {
        public function supports(Request $request): bool
        {
            $data = json_decode($request -> getContent(), true);

            return isset($data['hasDeleteCriteria']) && 
                $data['hasDeleteCriteria'] === 'del previous registration';
        }

        public function fill(DeleteConnectionContext $context, Request $request): void
        {
            $data = json_decode($request -> getContent(), true);

            if (isset($data['usersId']) && 
                isset($data['usersIp']) && 
                isset($data['usersAgent']))
            {
                $context -> usersId    = (int)$data['usersId'];
                $context -> usersIp    = (string)$data['usersIp'];
                $context -> usersAgent = (string)$data['usersAgent'];
            }
        }
    }
?>