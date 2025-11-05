<?php
    class setLotNumber extends Connect {
        public function set_lot_number($data){
            $numberOf_participants = count($data);
            $all_lots = range(1, $numberOf_participants, 1);
            shuffle($all_lots);
            for ($a=0; $a < $numberOf_participants; $a++){
                $sql="UPDATE powerlifting.main_table SET lot='$all_lots[$a]' WHERE main_id='$data[$a]'";
                $this -> connect() -> query($sql);
            }

            $this -> connect() -> close();

            $responce = array();
            foreach ($data as $index => $idValue) {
                $responce[] = [
                    'id' => $idValue,
                    'newValue' => $all_lots[$index]
                ];
            }

            return $responce;
        }
    }
?>