<?php
    class CheckNomination extends GetData {
        public function check($nominID){
            $sql="SELECT nomination FROM powerlifting.competitions WHERE comp_id = $nominID";
            $result = $this -> getData($sql);
            $this -> connect() -> close();
            $row = $result[0]['nomination'];
            return $row;
        }
    }
?>