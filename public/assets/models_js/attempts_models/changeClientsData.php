<?php
    class ChangeClientsData extends Connect {
        public function __construct($data){
            $sql = "UPDATE powerlifting.computer_status SET comp_status = '$data[1]' WHERE id_status = $data[0]";
            $this -> connect() -> query($sql);
            $this -> connect() -> close();
        }
    }
?>