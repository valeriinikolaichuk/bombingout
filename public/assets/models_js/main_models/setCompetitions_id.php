<?php
    class SetCompetitions_id extends Connect {
        public function __construct($compID){
            $id_status = (int)$_SESSION['id_status'];

            $sql = "SELECT users_ID FROM powerlifting.computer_status WHERE id_status = $id_status";
            $usersID = $this -> connect() -> query($sql);
            $users_id = $usersID -> fetch_row();
            $users_ID = (int)$users_id[0];

            $sql = "UPDATE powerlifting.computer_status SET comp_id = $compID WHERE users_ID = $users_ID";
            $this -> connect() -> query($sql);
            $this -> connect() -> close();
        }
    }
?>