<?php
    namespace App\Service\DeleteConnection\DeleteFiller;

    use App\Service\DeleteConnection\DeleteConnectionFillerInterface;
    use App\Service\DeleteConnection\DeleteConnectionContext;

    use Symfony\Component\HttpFoundation\Request;

    class DeleteAllConnectionsFiller implements DeleteConnectionFillerInterface
    {
        public function supports(Request $request): bool
        {
            $data = json_decode($request -> getContent(), true);

            return isset($data['hasDeleteCriteria']) && 
                $data['hasDeleteCriteria'] === 'delete all by usersId';
        }

        public function fill(DeleteConnectionContext $context, Request $request): void
        {
            $data = json_decode($request -> getContent(), true);

            if (isset($data['usersId']) &&  
                isset($data['id_status']))
            {
                $context -> usersId   = (int)$data['usersId'];
                $context -> id_status = (int)$data['id_status'];
            }
        }
    }
?>