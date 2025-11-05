<?php
    class SetGroupLotManually extends Connect {
        public function __construct($data){
            if (isset($data['grp'])) {
                $index = 'grp';
                $id = $data['grp'];                
            } elseif (isset($data['lot'])) {
                $index = 'lot';
                $id = $data['lot'];
            } else {
                throw new Exception('no grp or lot was sent');
            }

            $value = (int)$data['value'];
            $sql="UPDATE powerlifting.main_table SET ".$index." = CAST($value AS INT) WHERE main_id = $id";
            $this -> connect() -> query($sql);
            $this -> connect() -> close();
        }
    }
?>