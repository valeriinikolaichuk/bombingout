<?php
    class CheckStatusAdmin extends GetData {
        public function checkAdmin($column, $users_ID){
            $sql = "SELECT ".$column." FROM powerlifting.computer_status WHERE users_ID = $users_ID AND comp_status = 'admin'";
            $checkStatus = $this -> getData($sql);

            return $checkStatus;
        }
    }
?>