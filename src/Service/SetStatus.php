<?php
    namespace App\Service;

    use App\Service\InsertStatus;
    use App\Service\CheckStatusClient;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class SetStatus extends InsertStatus {
        private $checkStatusClient;

        public function __construct(){
            $id_status = (int)$_SESSION['id_status'];

            if (isset($_POST['comp_status'])){
                $comp_status = $_POST['comp_status'];
            } elseif (isset($_SESSION['comp_status'])){
                $comp_status = $_SESSION['comp_status'];
                unset($_SESSION['comp_status']);
            } else {
                session_unset();
                header('Location: index.php');
            }

            unset($_SESSION['id']);
            unset($_SESSION['status']);
            unset($_SESSION['language']);

            $this -> insert_status($comp_status, $id_status);
            $this -> checkStatusClient = new CheckStatusClient($comp_status);
        }
    }
?>