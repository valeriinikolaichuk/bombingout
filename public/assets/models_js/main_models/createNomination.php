<?php
    class CreateNomination extends Connect {
        public function createNomination($preliminary, $final, $nominID){
            $sql = "UPDATE powerlifting.competitions SET nomination = 'nomination', preliminary = CAST('$preliminary' AS DATE), 
                final = CAST('$final' AS DATE), status = 'PRELIMINARY' WHERE comp_id = $nominID";
            $this -> connect() -> query($sql);
            $this -> connect() -> close();
        }
    }
?>