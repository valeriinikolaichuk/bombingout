<?php
    class ChangeCompetitionsData extends Connect {
        public function set_data($data){
            $a=0;
            $competition_name = $data[$a][1];
            $country = $data[++$a][1];
            $city = $data[++$a][1];
            $start_date = $data[++$a][1];
            $end_date = $data[++$a][1];
            $division = $data[++$a][1];
            $sex = $data[++$a][1];
            $age_group = $data[++$a][1];
            $type = $data[++$a][1];
            $categories = $data[++$a][1];
            $id = $data[++$a][1];

            if (!empty($competition_name) && !empty($country) && !empty($city) && !empty($start_date) && !empty($end_date) 
                && !empty($division) && !empty($age_group) && !empty($sex) && !empty($type) && !empty($categories)){
            
                $sql="UPDATE powerlifting.competitions SET competition_name = '$competition_name', country = '$country', 
                    city = '$city', start_date = '$start_date', end_date = '$end_date', division = '$division', 
                    age_group = '$age_group', sex = '$sex',  type = '$type', categories = '$categories' WHERE comp_id = $id";

                $this -> connect() -> query($sql);
                $this -> connect() -> close();
            }          
        }
    }
?>