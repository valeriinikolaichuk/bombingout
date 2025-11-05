<?php
    class RegistrationOfNewUser extends Connect {
        private $login;
        private $password;
        private $status;
        private $id_status;
        private $team;

        public function checkNewData($condition){
            $sql = "SELECT id FROM powerlifting.users WHERE $condition";
            $usersId = $this -> connect() -> query($sql);
            $id = $usersId -> fetch_row();
            $this -> connect() -> close();

            return $id[0];
        }

        public function addUser($data){
            $this -> login = $data['login'];
            $this -> password = $data['password'];
            $this -> status = $data['status'];

            if ($data['status'] == 'participant'){
                $this -> id_status = (int)$data['id_status'];
                $this -> team = $data['team'];
            } else {
                $this -> id_status = 0;
                $this -> team = '';
            }

            $login = htmlentities($this->login, ENT_QUOTES, "UTF-8");
            $password = htmlentities($this->password, ENT_QUOTES, "UTF-8");            

            $this -> add_user($login, $password, $this->status, $this -> id_status, $this -> team);            
        }

        private function add_user($new_username, $new_password, $new_user_status, $id_status, $team){
            if ($id_status == 0){
                $users_id = 0;
            } else {
                $sql = "SELECT users_ID FROM powerlifting.computer_status WHERE id_status = $id_status";
                $usersID = $this -> connect() -> query($sql);
                $id = $usersID -> fetch_row();
                $users_id = (int)$id[0];
            }

            $sql = "INSERT INTO powerlifting.users (user, password, status, nominations_id, team)
                VALUES ('$new_username', '$new_password', '$new_user_status', $users_id, '$team')";
            $this -> connect() -> query($sql);
            $this -> connect() -> close();
        }
    }
?>