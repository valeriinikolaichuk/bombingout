<?php
    class PopupCreate extends CreateCompetitionsData {
        private $getSessionsValues;
        private $set_competitions_id;

        public function __construct($data){
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

            $this -> getSessionsValues = new GetSessionsValues;
            $id_status = (int)$_SESSION['id_status'];
            $sessVal = $this -> getSessionsValues -> sessionsValues('users_ID', $id_status);
            $users_ID = (int)$sessVal[0]['users_ID'];

            $this -> insert($competition_name, $country, $city, $start_date, $end_date, $division, 
                $sex, $age_group, $type, $categories, $users_ID);
            $lastID = $this -> get_last_id($users_ID);

            $this -> set_competitions_id = new SetCompetitions_id((int)$lastID);
        }
    }
?>