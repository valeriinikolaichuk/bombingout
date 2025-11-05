<?php
    class DeleteACompetition extends Connect {
        public function delete_a_competition($table, $compIdDelete){
            $sql="DELETE FROM powerlifting.".$table." WHERE comp_id = $compIdDelete";
            $this -> connect() -> query($sql);
        }

        public function delete_from_computer_status($compIdDelete){
            $sql="UPDATE powerlifting.computer_status SET comp_id = 0 WHERE comp_id = $compIdDelete";
            $this -> connect() -> query($sql);
            $this -> connect() -> close();
        }
    }
?>