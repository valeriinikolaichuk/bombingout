<?
    namespace App\Service\Login\LoginMethod;

    use App\Service\Login\LoginResultDTO;

    use Symfony\Component\HttpFoundation\Request;

    interface LoginMethodInterface 
    {
        public function supports(Request $request): bool;

        public function getMethod(Request $request): LoginResultDTO;
    }
?>