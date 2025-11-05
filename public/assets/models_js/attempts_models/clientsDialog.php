<?php
    class ClientsDialog extends GetData {
        public function show_clients($comp_id){
            $sql = "SELECT id_status, comp_status FROM powerlifting.computer_status 
                WHERE comp_id = $comp_id AND comp_status != 'admin'";
            $client = $this -> getData($sql);
            $this -> connect() -> close();

            return $client;
        }
    }
?>