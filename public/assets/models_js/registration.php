<?php
    trait Registration {
        private $login;
        private $password;

        public function checkLogin($data){
            $this -> login = $data['login'];
            $this -> password = $data['password'];
            $login = htmlentities($this->login, ENT_QUOTES, "UTF-8");
            $password = htmlentities($this->password, ENT_QUOTES, "UTF-8");

            $sql = "SELECT id, status, time, blocked, nominations_id, team FROM powerlifting.users WHERE user='$login' AND password='$password'";
            $show = $this -> getData($sql);
            $this -> connect() -> close();

            return $show;
        }
    }
?>