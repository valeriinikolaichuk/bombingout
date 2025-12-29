<?php
    namespace App\Service\ShowConnections;

    use Symfony\Component\HttpFoundation\Request;
    use App\Service\ShowConnections\GetData\GetDataInterface;

    class UserDataFactory
    {
        /** @var iterable<GetDataInterface> */
        public function __construct(private iterable $getData) {}

        public function getUsersData(
            Request $request
            ): UserDataDTO {
        
            $context = new UserDataDTO(); 

            foreach ($this -> getData as $usersData) {
                if ($usersData -> supports($request)) {
                    $usersData -> getData($context, $request);
                }
            }
         
            return $context;
        }
    }
?>