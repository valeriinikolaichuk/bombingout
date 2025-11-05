<?php
    class SetParticipantsData extends AllResults {
        public function set_competitions_data($data){
            $length = count($data) - 1;
            $compID = $data[$length];
            $forCheck = ['category', 'bodyweight', 'iPF_GL_Cf', 'grp', 'lot', 'rank_class', 'region', 'city', 'club', 
                'trener_1', 'trener_2', 'trener_3', 'trener_4', 'titles', 'personally', 'out_of_comp', 'md', 'dbl', 
                'squat_nom', 'bench_press_nom', 'deadlift_nom', 'total_nom', 'squat_1', 'bench_press_1','deadlift_1', 'total_1_att'];

            $main_id = $surname_name = $date_of_birth = $data_array = [];
            foreach ($forCheck as $field){
                ${$field} = [];
                $data_array[$field] = [];
            }

            $a=0;
            $b=0;
            while ($a < $length){
                if ($data[$a][0] == 'main_id'){
                    $main_id[$b] = $data[$a][1];
                    $surname_name[$b] = $data[++$a][1];
                    $day[$b] = $data[++$a][1];
                    $month[$b] = $data[++$a][1];
                    $year[$b] = $data[++$a][1];

                    if ($day[$b] == ''){
                        $day[$b] = '00';
                    }

                    if ($month[$b] == ''){
                        $month[$b] = '00';
                    }

                    if ($year[$b] == ''){
                        $year[$b] = '0000';
                    }

                    $dd = strlen($day[$b]);
                    if ($dd == 1){
                        $day[$b] = '0'.$day[$b];
                    }

                    $mm = strlen($month[$b]);
                    if ($mm == 1){
                        $month[$b] = '0'.$month[$b];
                    }

                    $yyyy = strlen($year[$b]);
                    if ($yyyy != 4){
                        $year[$b] = '0000';
                    }

                    $date_of_birth[$b] = $year[$b].'-'.$month[$b].'-'.$day[$b];

                    ++$a;

                    while ($a < $length && $data[$a][0] !== 'main_id'){
                        $key = $data[$a][0];
                        if (in_array($key, $forCheck, true)){
                            $data_array[$key][$b] = $data[$a][1];
                        }

                        $a++;
                    }

                    foreach ($forCheck as $field) {
                        if (!isset(${$field}[$b])) {
                            ${$field}[$b] = 0;
                        } elseif (${$field}[$b] != '-1'){
                            ${$field}[$b] = (int)${$field}[$b];
                        }
                    }

                    $b++;
                } else {
                    ++$a;
                }
            }
            
            $num_rows = count($data_array['category']);
            for ($i = 0; $i < $num_rows; $i++){
                foreach ($data_array as $key => $values){
                    if (isset($$key) && is_array($$key)){
                        $$key[$i] = $values[$i] ?? "";
                    }
                }
            }

            $replacements = [
                '67,5 kg' => '67 kg',
                '82,5 kg' => '82 kg',
                '100+ kg' => '101 kg',
                '125+ kg' => '126 kg'
            ];

            $category_corr = $data_array['category'];
            $category_num = array_map(function($cat) use ($replacements){
                $cat = $replacements[$cat] ?? $cat;
                return (int)preg_replace('/[^0-9]/', '', $cat);
            }, $category_corr);

            $numericArrays = ['iPF_GL_Cf', 'squat_nom', 'bench_press_nom', 'deadlift_nom', 
                'total_nom', 'squat_1', 'bench_press_1', 'deadlift_1', 'total_1_att'];

            foreach ($numericArrays as $arrayName) {
                foreach ($$arrayName as $key => $value) {
                    if ($value === '' || $value === NULL) {
                        $$arrayName[$key] = ($arrayName === 'iPF_GL_Cf') ? '0.0000' : '0.0';
                    }
                }
            }

            $sql = "SELECT type FROM powerlifting.competitions WHERE comp_id = $compID";
            $compData = $this -> getData($sql);
            $compTYPE = $compData[0]['type'];

            $conn = $this->connect();
            $conn->set_charset('utf8mb4');

            $numberOfRows = count($main_id);
            for ($a=0; $a < $numberOfRows; $a++){
                $category_num[$a] = ($category_num[$a] === 0 ? 'NULL' : (int)$category_num[$a]);
                $grp[$a] = (int)$grp[$a];
                $lot[$a] = ($lot[$a] === '' ? 'NULL' : (int)$lot[$a]);
                $personally[$a] = ($personally[$a] === '' ? 'NULL' : (int)$personally[$a]);
                $out_of_comp[$a] = ($out_of_comp[$a] === '' ? 'NULL' : (int)$out_of_comp[$a]);
                $md[$a] = ($md[$a] === '' ? 'NULL' : (int)$md[$a]);
                $dbl[$a] = ($dbl[$a] === '' ? 'NULL' : (int)$dbl[$a]);
            }

            for ($a=1; $a < $numberOfRows; $a++){
                if (!empty($surname_name[$a])){
                    $sql="UPDATE powerlifting.main_table SET 
                        surname_name = '".$conn->real_escape_string($surname_name[$a])."', 
                        date_of_birth = '$date_of_birth[$a]', 
                        bodyweight = CAST(NULLIF('$bodyweight[$a]', '') AS DECIMAL(5,2)), 
                        category = NULLIF('$category[$a]', ''), 
                        category_num = $category_num[$a], 
                        iPF_GL_Cf = CAST('$iPF_GL_Cf[$a]' AS DECIMAL(5,4)), 
                        grp = $grp[$a], lot = $lot[$a], 
                        rank_class = '".$conn->real_escape_string($rank_class[$a])."', 
                        region ='".$conn->real_escape_string($region[$a])."', 
                        city = '".$conn->real_escape_string($city[$a])."', 
                        club = '".$conn->real_escape_string($club[$a])."', 
                        trener_1 = '".$conn->real_escape_string($trener_1[$a])."', 
                        trener_2 = '".$conn->real_escape_string($trener_2[$a])."', 
                        trener_3 = '".$conn->real_escape_string($trener_3[$a])."', 
                        trener_4 = '".$conn->real_escape_string($trener_4[$a])."', 
                        titles = '".$conn->real_escape_string($titles[$a])."', 
                        personally = $personally[$a], out_of_comp = $out_of_comp[$a], 
                        MD = $md[$a], dbl = $dbl[$a], 
                        squat_nom = CAST('$squat_nom[$a]' AS DECIMAL(4,1)), 
                        bench_press_nom = CAST('$bench_press_nom[$a]' AS DECIMAL(4,1)), 
                        deadlift_nom = CAST('$deadlift_nom[$a]' AS DECIMAL(4,1)), 
                        total_nom = CAST('$total_nom[$a]' AS DECIMAL(5,1)), 
                        squat_1 = CASE 
                            WHEN squat_1_CSS = 'color: #000000;' THEN CAST('$squat_1[$a]' AS DECIMAL(4,1)) ELSE squat_1 
                        END, 
                        bench_press_1 = CASE 
                            WHEN bench_press_1_CSS = 'color: #000000;' THEN CAST('$bench_press_1[$a]' AS DECIMAL(4,1)) ELSE bench_press_1 
                        END, 
                        deadlift_1 = CASE 
                            WHEN deadlift_1_CSS = 'color: #000000;' THEN CAST('$deadlift_1[$a]' AS DECIMAL(4,1)) ELSE deadlift_1 
                        END, 
                        squat_1_fcst = CASE 
                            WHEN squat_1_CSS = 'color: #000000;' THEN CAST('$squat_1[$a]' AS DECIMAL(4,1)) ELSE squat_1_fcst 
                        END,
                        bench_press_1_fcst = CASE 
                            WHEN bench_press_1_CSS = 'color: #000000;' THEN CAST('$bench_press_1[$a]' AS DECIMAL(4,1)) ELSE bench_press_1_fcst 
                        END, 
                        deadlift_1_fcst = CASE 
                            WHEN deadlift_1_CSS = 'color: #000000;' THEN CAST('$deadlift_1[$a]' AS DECIMAL(4,1)) ELSE deadlift_1_fcst 
                        END, 
                        total_1_att = CAST('$total_1_att[$a]' AS DECIMAL(5,1)) 
                        WHERE main_id=$main_id[$a]";
                    $this -> connect() -> query($sql);

                    $this -> discipline_forecast('bench_press', $main_id[$a]);
                    $this -> discipline_result('bench_press', $main_id[$a]);

                    if ($compTYPE == 'powerlifting'){
                        $this -> discipline_forecast('squat', $main_id[$a]);
                        $this -> discipline_forecast('deadlift', $main_id[$a]);
                        $this -> total_forecast($main_id[$a]);

                        $this -> discipline_result('squat', $main_id[$a]);
                        $this -> discipline_result('deadlift', $main_id[$a]);
                        $this -> total_result($main_id[$a]);
                    }
                }
            }
 
            if (!empty($surname_name[0])){
                $sql="INSERT INTO powerlifting.main_table (surname_name, date_of_birth, bodyweight, category, category_num, iPF_GL_Cf, grp, lot, rank_class, region, city, club, 
                    trener_1, trener_2, trener_3, trener_4, titles, squat_nom, bench_press_nom, deadlift_nom, total_nom, squat_1, bench_press_1, deadlift_1, squat_1_fcst, 
                    bench_press_1_fcst, deadlift_1_fcst, total_1_att, comp_id) 
                    VALUES (
                        '".$conn->real_escape_string($surname_name[0])."', '$date_of_birth[0]', 
                        CAST(NULLIF('$bodyweight[0]', '') AS DECIMAL(5,2)), 
                        NULLIF('$category[0]', ''), $category_num[0],  
                        CAST('$iPF_GL_Cf[0]' AS DECIMAL(5,4)), $grp[0], $lot[0], 
                        '".$conn->real_escape_string($rank_class[0])."', 
                        '".$conn->real_escape_string($region[0])."', 
                        '".$conn->real_escape_string($city[0])."', 
                        '".$conn->real_escape_string($club[0])."', 
                        '".$conn->real_escape_string($trener_1[0])."', 
                        '".$conn->real_escape_string($trener_2[0])."', 
                        '".$conn->real_escape_string($trener_3[0])."', 
                        '".$conn->real_escape_string($trener_4[0])."', 
                        '".$conn->real_escape_string($titles[0])."', 
                        CAST('$squat_nom[0]' AS DECIMAL(4,1)), 
                        CAST('$bench_press_nom[0]' AS DECIMAL(4,1)), 
                        CAST('$deadlift_nom[0]' AS DECIMAL(4,1)), 
                        CAST('$total_nom[0]' AS DECIMAL(5,1)), 
                        CAST('$squat_1[0]' AS DECIMAL(4,1)), 
                        CAST('$bench_press_1[0]' AS DECIMAL(4,1)), 
                        CAST('$deadlift_1[0]' AS DECIMAL(4,1)), 
                        CAST('$squat_1[0]' AS DECIMAL(4,1)), 
                        CAST('$bench_press_1[0]' AS DECIMAL(4,1)), 
                        CAST('$deadlift_1[0]' AS DECIMAL(4,1)), 
                        CAST('$total_1_att[0]' AS DECIMAL(5,1)), '$compID')";
                $this -> connect() -> query($sql);

                $sql ="SELECT MAX(main_id) FROM powerlifting.main_table WHERE comp_id = $compID";
                $last_id = $this -> connect() -> query($sql);
                $lastID = $last_id -> fetch_row();

                $checkBoxes = ['personally', 'out_of_comp', 'md', 'dbl'];
                foreach ($checkBoxes as $box) {
                    if (${$box}[0] == '-1') {
                        ${$box}[0] = (int)$lastID[0];
                    } else {
                        ${$box}[0] = 'NULL';
                    }
                }

                $main_id[0] = (int)$lastID[0];

                $sql="UPDATE powerlifting.main_table SET personally = $personally[0], out_of_comp = $out_of_comp[0], MD = $md[0], dbl = $dbl[0] WHERE main_id=$main_id[0]";
                $this -> connect() -> query($sql);

                $this -> discipline_forecast('bench_press', $main_id[0]);
                $this -> discipline_result('bench_press', $main_id[0]);

                if ($compTYPE == 'powerlifting'){
                    $this -> discipline_forecast('squat', $main_id[0]);
                    $this -> discipline_forecast('deadlift', $main_id[0]);
                    $this -> total_forecast($main_id[0]);

                    $this -> discipline_result('squat', $main_id[0]);
                    $this -> discipline_result('deadlift', $main_id[0]);
                    $this -> total_result($main_id[0]);
                }
            }

            $categories = array_values(array_unique($category_num));

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
            
            return $main_id;
        }
    }
?>