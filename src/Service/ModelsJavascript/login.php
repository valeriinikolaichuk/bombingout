<?php
    namespace App\Service\ModelsJavascript;

    use Doctrine\DBAL\Connection;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;
    use App\Entity\UserReg;
    use App\Service\CheckInTable;

    class Login {
        public function __construct(private Connection $db) {}


//        private $check_in_table;

        public function setSessionVariables(
            SessionInterface $session, 
            UserReg $user, 
            CheckInTable $checkInTable, 
            string $language): void {
            if ($user){
//            $number_of_rows = count($show);
//            if ($number_of_rows > 0){
                if (!$session -> has('id_status')){
                    $session -> set('id', $user -> getId());
                    $session -> set('status', $user -> getStatus());
                    $session -> set('language', $language);

//                    $_SESSION['id'] = $show[0]['id'];
//                    $_SESSION['status'] = $show[0]['status'];
//                    $_SESSION['language'] = $language;
                //  $_SESSION['time'] = $show[0]['time'];
                //  $_SESSION['blocked'] = $show[0]['blocked'];

//                    if ($_SESSION['status'] != 'participant'){
                    if ($user -> getStatus() !== 'participant'){
                        $id_user = $user -> getId();
                        $users_status = $user -> getStatus();



//                        $id_user = (int)$show[0]['id'];
//                        $users_status = $show[0]['status'];

                        $this -> db -> executeStatement(
                            "INSERT INTO powerliftingsymfony.computer_status (users_ID, users_status, lang)
                            VALUES (:id_user, :users_status, :lang)",
                            [
                                'id_user'      => $id_user,
                                'users_status' => $users_status,
                                'lang'         => $language,
                            ]
                        );


//                        $sql = "INSERT INTO powerliftingsymfony.computer_status (users_ID, users_status, lang) 
//                            VALUES ($id_user, '$users_status', '$language')";
//                        $this -> connect() -> query($sql);

                        $idStatus = (int)$this -> db -> fetchOne(
                            "SELECT MAX(id_status) FROM powerliftingsymfony.computer_status WHERE users_ID = :id_user",
                            ['id_user' => $id_user]
                        );

//                        $sql = "SELECT MAX(id_status) AS num FROM powerlifting.computer_status WHERE users_ID = $id_user";
//                        $id_st = $this -> getData($sql);
//                        $this -> connect() -> close();
//
//                        $id_status = (int)$id_st[0]['num'];

                        $session -> set('id_status', $idStatus);

//                        $_SESSION['id_status'] = $id_status;

                    } else {
                        $session -> set('nominations_id', $user -> getNominationsId());
//                        $_SESSION['nominations_id'] = $show[0]['nominations_id'];          
                    }



                    if ($session -> has('error_log_in')){
                        $session -> remove('error_log_in');
                    }


//                    if (isset($_SESSION['error_log_in'])){
//                        unset($_SESSION['error_log_in']);
//                    }
                } else {
                //    $this -> check_in_table = new CheckInTable;
                $id_status = $session -> get('id_status');
                //    $id_status = $_SESSION['id_status'];
                $result = $checkInTable -> checkInTable($id_status);
                //    $check_id_status_result = $this -> check_in_table -> checkInTable($id_status);



                if (empty($result)) {
                    $session -> clear();
                //    return false;
                }


/*
                    if(empty($check_id_status_result)){
                        session_unset();
                        header('Location: /index.php');
                        exit;
                    }*/
                }
//            } else {
//                $session -> set('error_log_in', '<span style="color: red;">login or password is not correct</span>');
//                $_SESSION['error_log_in'] = '<span style="color: red;">login or password is not correct</span>';
            }
//          $session->save();  
        }
    }
?>