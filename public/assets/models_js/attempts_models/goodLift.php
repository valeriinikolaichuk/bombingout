<?php
    class GoodLift extends AllResults {
        public function goood_lift($main_id, $data, $attemptColor, $discipline){
            $sql="UPDATE powerlifting.main_table SET 
                ".$attemptColor." = 'color: #0000FF; font-weight: 700;', 
                ".$discipline."_res = CAST(".$data[$discipline]." AS DECIMAL(4,1)) 
                WHERE main_id=$main_id";
            $this -> connect() -> query($sql);

            $this -> discipline_result($data['discipline'], $main_id);

            $compTYPE = $this -> comp_type((int)$data['compID']);
            $categories = array();
            $categories[0] = (int)$data['category_num'];

            if ($compTYPE == 'powerlifting'){
                $this -> total_result($main_id);

                $results = [$data['discipline'].'_res', 'total'];
                $deadlift = ['', 'deadlift_res, '];
                $ranking = [$data['discipline'].'_rnk', 'ranking'];
                $points = 'points';

                for ($a = 0; $a < 2; $a++){
                    $this -> set_ranking($categories, $results[$a], $deadlift[$a], $ranking[$a], (int)$data['compID'], $points);
                }
            } else {
                $results = 'bench_press_res';
                $deadlift = '';
                $ranking = 'bench_press_rnk';
                $points = 'points_bp';

                $this -> set_ranking($categories, $results, $deadlift, $ranking, (int)$data['compID'], $points);
            }
        }

        public function no_lift($main_id, $data, $attemptColor, $discipline){
            $sql="UPDATE powerlifting.main_table SET 
                ".$attemptColor." = 'color: #FF0000; font-weight: 700; text-decoration: line-through;', 
                ".$discipline."_fcst = CAST(0.0 AS DECIMAL(4,1)) 
                WHERE main_id=$main_id";
            $this -> connect() -> query($sql);

            $this -> discipline_forecast($data['discipline'], $main_id);

            $compTYPE = $this -> comp_type((int)$data['compID']);
            $categories = array();
            $categories[0] = (int)$data['category_num'];

            $points = '';
            if ($compTYPE == 'powerlifting'){
                $this -> total_forecast($main_id);

                $results = [$data['discipline'].'_fcst', 'total_fcst'];
                $deadlift = ['', 'deadlift_fcst, '];
                $ranking = [$data['discipline'].'_rnk_fcst', 'rnk_fcst'];

                for ($a = 0; $a < 2; $a++){
                    $this -> set_ranking($categories, $results[$a], $deadlift[$a], $ranking[$a], (int)$data['compID'], $points);
                }
            } else {
                $results = 'bench_press_fcst';
                $deadlift = '';
                $ranking = 'bench_press_rnk_fcst';

                $this -> set_ranking($categories, $results, $deadlift, $ranking, (int)$data['compID'], $points);
            }
        }

        public function cancel_att($main_id, $data, $attemptColor, $discipline){
            $compTYPE = $this -> comp_type((int)$data['compID']);
            $categories = array();
            $categories[0] = (int)$data['category_num'];

            if ($data[$attemptColor] == 'color: #FF0000; font-weight: 700; text-decoration: line-through;'){
                $sql="UPDATE powerlifting.main_table SET 
                    ".$attemptColor." = 'color: #000000;', 
                    ".$discipline."_fcst = CAST(".$data[$discipline]." AS DECIMAL(4,1)) 
                    WHERE main_id=$main_id";
                $this -> connect() -> query($sql);

                $this -> discipline_forecast($data['discipline'], $main_id);

                $points = '';
                if ($compTYPE == 'powerlifting'){
                    $this -> total_forecast($main_id);

                    $results = [$data['discipline'].'_fcst', 'total_fcst'];
                    $deadlift = ['', 'deadlift_fcst, '];
                    $ranking = [$data['discipline'].'_rnk_fcst', 'rnk_fcst'];

                    for ($a = 0; $a < 2; $a++){
                        $this -> set_ranking($categories, $results[$a], $deadlift[$a], $ranking[$a], (int)$data['compID'], $points);
                    }
                } else {
                    $results = 'bench_press_fcst';
                    $deadlift = '';
                    $ranking = 'bench_press_rnk_fcst';

                    $this -> set_ranking($categories, $results, $deadlift, $ranking, (int)$data['compID'], $points);
                }
            } else {
                $sql="UPDATE powerlifting.main_table SET 
                    ".$attemptColor." = 'color: #000000;', 
                    ".$discipline."_res = CAST(0.0 AS DECIMAL(4,1)) 
                    WHERE main_id=$main_id";
                $this -> connect() -> query($sql);

                $this -> discipline_result($data['discipline'], $main_id);

                if ($compTYPE == 'powerlifting'){
                    $this -> total_result($main_id);

                    $results = [$data['discipline'].'_res', 'total'];
                    $deadlift = ['', 'deadlift_res, '];
                    $ranking = [$data['discipline'].'_rnk', 'ranking'];
                    $points = 'points';

                    for ($a = 0; $a < 2; $a++){
                        $this -> set_ranking($categories, $results[$a], $deadlift[$a], $ranking[$a], (int)$data['compID'], $points);
                    }
                } else {
                    $results = 'bench_press_res';
                    $deadlift = '';
                    $ranking = 'bench_press_rnk';
                    $points = 'points_bp';

                    $this -> set_ranking($categories, $results, $deadlift, $ranking, (int)$data['compID'], $points);
                }
            }
        }

        public function set_attempts_first_batch($data, $discipline){
            $cases = "";
            $ids = [];

            foreach ($data as $id => $weight) {
                $cases .= "WHEN $id THEN CAST($weight AS DECIMAL(4,1)) ";
                $ids[] = $id;
            }

            $idList = implode(',', $ids);

            $sql = "UPDATE powerlifting.main_table SET
                    {$discipline}_1 = CASE main_id
                        $cases
                    END,
                    {$discipline}_1_fcst = CASE main_id
                        $cases
                    END
                WHERE main_id IN ($idList)";

            $this->connect()->query($sql);
        }

        public function set_attempts_batch_all($batchDataAll, $discipline){
            $cases = [];
            $ids = [];

            foreach ($batchDataAll as $id => $attempts) {
                $ids[] = $id;
                foreach ($attempts as $col => $weight) {
                    if (!isset($cases[$col])) $cases[$col] = "";
                    $cases[$col] .= "WHEN $id THEN CAST($weight AS DECIMAL(4,1)) ";
                }
            }

            $idList = implode(',', $ids);

            $sql = "UPDATE powerlifting.main_table SET\n";

            foreach ($cases as $col => $caseStr) {
                $sql .= "  {$col} = CASE main_id $caseStr END,\n";
                $sql .= "  {$col}_fcst = CASE main_id $caseStr END,\n";
            }

            $sql = rtrim($sql, ",\n");
            $sql .= " WHERE main_id IN ($idList)";

            $this->connect()->query($sql);
        }

        public function set_attempts_forecast($main_id, $lift, $compID, $categories){
            $compTYPE = $this -> comp_type($compID);

            $this -> discipline_forecast_all($lift, $main_id);
            if ($compTYPE == 'powerlifting'){
                $this -> total_forecast_all($main_id);
            }

            $points = '';
            if ($compTYPE == 'powerlifting'){
                $results = [$lift.'_fcst', 'total_fcst'];
                $deadlift = ['', 'deadlift_fcst, '];
                $ranking = [$lift.'_rnk_fcst', 'rnk_fcst'];

                for ($a = 0; $a < 2; $a++){
                    $this -> set_ranking($categories, $results[$a], $deadlift[$a], $ranking[$a], $compID, $points);
                }
            } else {
                $results = 'bench_press_fcst';
                $deadlift = '';
                $ranking = 'bench_press_rnk_fcst';

                $this -> set_ranking($categories, $results, $deadlift, $ranking, $compID, $points);
            }
        }

        private function comp_type($compID){
            $sql = "SELECT type FROM powerlifting.competitions WHERE comp_id = $compID";
            $compData = $this -> getData($sql);

            $compTYPE = $compData[0]['type'];
            return $compTYPE;
        }
    }
?>