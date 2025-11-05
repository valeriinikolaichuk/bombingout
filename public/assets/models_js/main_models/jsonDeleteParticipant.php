<?php
    class JsonDeleteParticipant extends AllResults {
        public function delete($data){
            $mainId = (int)$data['mainId'];
            $sql = "DELETE FROM powerlifting.main_table WHERE main_id = $mainId";
            $this -> connect() -> query($sql);

            $compID = (int)$data['compID'];
            $sql = "SELECT type FROM powerlifting.competitions WHERE comp_id = $compID";
            $compData = $this -> getData($sql);
            $compTYPE = $compData[0]['type'];

            $category = $data['category'];
            $replacements = [
                '67,5 kg' => '67 kg',
                '82,5 kg' => '82 kg',
                '100+ kg' => '101 kg',
                '125+ kg' => '126 kg'
            ];

            $category = $replacements[$category] ?? $category;
            $category = (int)preg_replace('/[^0-9]/', '', $category);
            $categories = [0 => $category];

            $points = '';
            if ($compTYPE == 'powerlifting'){
                $results = ['squat_fcst', 'bench_press_fcst', 'deadlift_fcst', 'total_fcst'];
                $deadlift = ['', '', '', 'deadlift_fcst, '];
                $ranking = ['squat_rnk_fcst', 'bench_press_rnk_fcst', 'deadlift_rnk_fcst', 'rnk_fcst'];

                for ($a = 0; $a < 4; $a++){
                    $this -> set_ranking($categories, $results[$a], $deadlift[$a], $ranking[$a], $compID, $points);
                }
            } else {
                $results = 'bench_press_fcst';
                $deadlift = '';
                $ranking = 'bench_press_rnk_fcst';

                $this -> set_ranking($categories, $results, $deadlift, $ranking, $compID, $points);
            }

            if ($compTYPE == 'powerlifting'){
                $results = ['squat_res', 'bench_press_res', 'deadlift_res', 'total'];
                $deadlift = ['', '', '', 'deadlift_res, '];
                $ranking = ['squat_rnk', 'bench_press_rnk', 'deadlift_rnk', 'ranking'];
                $points = 'points';

                for ($a = 0; $a < 4; $a++){
                    $this -> set_ranking($categories, $results[$a], $deadlift[$a], $ranking[$a], $compID, $points);
                }
            } else {
                $results = 'bench_press_res';
                $deadlift = '';
                $ranking = 'bench_press_rnk';
                $points = 'points_bp';

                $this -> set_ranking($categories, $results, $deadlift, $ranking, $compID, $points);
            }

            $this -> connect() -> close();
        }
    }
?>