<?php
    class CheckSession extends GetData {
        public function check_session($id_user, $id_status){
            $sql = "SELECT id_status, lang FROM powerlifting.computer_status 
                WHERE users_ID = $id_user AND id_status < $id_status LIMIT 1";
            $old_sessions = $this -> getData($sql);
            $this -> connect() -> close();

            return $old_sessions;
        }
    }
?>