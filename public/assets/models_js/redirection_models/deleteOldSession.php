<?php
    class DeleteOldSession extends Connect {
        public function __construct($id_user, $id_status){
            $sql = "DELETE FROM powerlifting.computer_status WHERE users_ID = $id_user AND id_status < $id_status";
            $this -> connect() -> query($sql);
            $this -> connect() -> close();
        }
    }
?>