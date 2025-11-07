<?php
    namespace App\Service\ModelsJavascript;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class Login extends GetData {
        use Registration;

        private $check_in_table;

        public function set_session_variables($show, $language){
            $number_of_rows = count($show);

            if ($number_of_rows > 0){
                if (!isset($_SESSION['id_status'])){

                    $_SESSION['id'] = $show[0]['id'];
                    $_SESSION['status'] = $show[0]['status'];
                    $_SESSION['language'] = $language;
                //  $_SESSION['time'] = $show[0]['time'];
                //  $_SESSION['blocked'] = $show[0]['blocked'];

                    if ($_SESSION['status'] != 'participant'){
                        $id_user = (int)$show[0]['id'];
                        $users_status = $show[0]['status'];

                        $sql = "INSERT INTO powerlifting.computer_status (users_ID, users_status, lang) 
                            VALUES ($id_user, '$users_status', '$language')";
                        $this -> connect() -> query($sql);

                        $sql = "SELECT MAX(id_status) AS num FROM powerlifting.computer_status WHERE users_ID = $id_user";
                        $id_st = $this -> getData($sql);
                        $this -> connect() -> close();

                        $id_status = (int)$id_st[0]['num'];
                        $_SESSION['id_status'] = $id_status;

                    } else {
                        $_SESSION['nominations_id'] = $show[0]['nominations_id'];          
                    }

                    if (isset($_SESSION['error_log_in'])){
                        unset($_SESSION['error_log_in']);
                    }
                } else {
                    $this -> check_in_table = new CheckInTable;
                    $id_status = $_SESSION['id_status'];
                    $check_id_status_result = $this -> check_in_table -> check_InTable($id_status);

                    if(empty($check_id_status_result)){
                        session_unset();
                        header('Location: /index.php');
                        exit;
                    }
                }
            } else { 
                $_SESSION['error_log_in'] = '<span style="color: red;">login or password is not correct</span>';
            }
        }
    }
?>
