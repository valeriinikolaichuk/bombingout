<?php
    class CreateCompetitionsData extends Connect {
        public function insert($competition_name, $country, $city, $start_date, $end_date, $division, 
            $sex, $age_group, $type, $categories, $pId){

            if (!empty($competition_name) && !empty($country) && !empty($city) && !empty($start_date) && !empty($end_date) 
                && !empty($division) && !empty($age_group) && !empty($sex) && !empty($type) && !empty($categories)){

                $sql="INSERT INTO powerlifting.competitions (competition_name, country, city, start_date, end_date, 
                    division, age_group, sex, type, categories, users_id) VALUES ('$competition_name', '$country', '$city', 
                    '$start_date', '$end_date', '$division', '$age_group', '$sex', '$type', '$categories', $pId)";

                $this -> connect() -> query($sql);
            }
        }

        public function get_last_id($id){
            $sql="SELECT MAX(comp_id) FROM powerlifting.competitions WHERE users_id = $id";
            $last_id = $this -> connect() -> query($sql);
            $lastID = $last_id -> fetch_row();

            return $lastID[0];
        }
    }
?>