<?php
    class SidePanelData extends GetData {
        public function getSidePanelData($id){
            $sql = "SELECT rank_class, region, city, club, trener_1, trener_2, trener_3, trener_4, titles 
                FROM powerlifting.main_table WHERE main_id = $id";
            $value = $this -> getData($sql);
            $this -> connect() -> close();

            return $value;
        }
    }
?>