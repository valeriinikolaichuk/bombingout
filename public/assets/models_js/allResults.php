<?php
    class AllResults extends GetData {
        public function discipline_forecast($lift, $main_id){
            $sql = "UPDATE powerlifting.main_table 
                SET {$lift}_fcst = GREATEST({$lift}_1_fcst, {$lift}_2_fcst, {$lift}_3_fcst, {$lift}_4_fcst), 
                    wilks_fcst_{$lift} = CAST({$lift}_fcst * iPF_GL_Cf AS DECIMAL(5,2)) 
                WHERE main_id = $main_id";
            $this -> connect() -> query($sql); 
        }

        public function discipline_result($lift, $main_id){
            $sql = "UPDATE powerlifting.main_table 
                SET {$lift}_res = GREATEST({$lift}_1_res, {$lift}_2_res, {$lift}_3_res, {$lift}_4_res), 
                    wilks_{$lift} = CAST({$lift}_res * iPF_GL_Cf AS DECIMAL(5,2)) 
                WHERE main_id = $main_id";
            $this -> connect() -> query($sql);
        }

        public function total_forecast($main_id){
            $sql="UPDATE powerlifting.main_table 
                SET total_fcst = 
                CASE 
                    WHEN squat_fcst = 0.00 
                      OR bench_press_fcst = 0.00 
                      OR deadlift_fcst = 0.00 
                    THEN 0.00 
                    ELSE CAST(squat_fcst + bench_press_fcst + deadlift_fcst AS DECIMAL(5,1)) 
                END, 
                    iPF_GL_fcst = CAST(total_fcst * iPF_GL_Cf AS DECIMAL(5,2)), 
                    total_1_att = CAST(squat_1 + bench_press_1 + deadlift_fcst AS DECIMAL(5,1))
                WHERE main_id = $main_id";
            $this -> connect() -> query($sql);
        }

        public function total_result($main_id){
            $sql="UPDATE powerlifting.main_table 
                SET total = 
                CASE 
                    WHEN squat_res = 0.00 
                      OR bench_press_res = 0.00 
                      OR deadlift_res = 0.00 
                    THEN 0.00 
                    ELSE CAST(squat_res + bench_press_res + deadlift_res AS DECIMAL(5,1)) 
                END, 
                    iPF_GL = CAST(total * iPF_GL_Cf AS DECIMAL(5,2)) 
                WHERE main_id = $main_id";
            $this -> connect() -> query($sql);
        }

        public function discipline_forecast_all($lift, $main_id){
            $ids = implode(',', array_map('intval', $main_id));
            $sql = "UPDATE powerlifting.main_table SET 
                {$lift}_fcst = GREATEST({$lift}_1_fcst, {$lift}_2_fcst, {$lift}_3_fcst, {$lift}_4_fcst), 
                wilks_fcst_{$lift} = CAST({$lift}_fcst * iPF_GL_Cf AS DECIMAL(5,2)) 
                WHERE main_id IN ($ids)";

            $this -> connect() -> query($sql);
        }

        public function total_forecast_all($main_id){
            $ids = implode(',', array_map('intval', $main_id));
            $sql = "UPDATE powerlifting.main_table 
                    SET total_fcst = 
                        CASE 
                            WHEN squat_fcst = 0.00 OR bench_press_fcst = 0.00 OR deadlift_fcst = 0.00
                            THEN 0.00
                            ELSE CAST(squat_fcst + bench_press_fcst + deadlift_fcst AS DECIMAL(5,1))
                        END, 
                        iPF_GL_fcst = CAST(total_fcst * iPF_GL_Cf AS DECIMAL(5,2)),
                        total_1_att = CAST(squat_1 + bench_press_1 + deadlift_fcst AS DECIMAL(5,1))
                    WHERE main_id IN ($ids)";
            $this -> connect() -> query($sql);
        }

        public function set_ranking($category_num, $results, $deadlift, $ranking, $compID, $points){
            $number_of_categories = count($category_num);
            if ($number_of_categories > 0){
                for ($n = 0; $n < $number_of_categories; $n++){
                    $cat = (int)$category_num[$n];
                    $sql = "SELECT main_id, ".$results.", personally, out_of_comp FROM powerlifting.main_table 
                        WHERE comp_id = $compID AND category_num = $cat 
                        ORDER BY ".$results." DESC, bodyweight, ".$deadlift."lot";
                    $all_in_category = $this -> getData($sql);

                    $amount = count($all_in_category);
                    if ($amount > 0){
                        $rank = array();
                        $rank_no = 1;

                        for ($a=0; $a < $amount; $a++){
                            $out_of_comp = (int)$all_in_category[$a]['out_of_comp'];
                            if ($all_in_category[$a][$results] == '0.0'){
                                $rank[$a] = 'NULL';
                            } elseif ($out_of_comp !== 0){
                                $rank[$a] = 'NULL';
                            } else {
                                $rank[$a] = (int)$rank_no;
                                ++$rank_no;
                            }
                        }

                        for ($a=0; $a < $amount; $a++){
                            $athlete_id = (int)$all_in_category[$a]['main_id'];
                            $sql = "UPDATE powerlifting.main_table SET ".$ranking." = ".$rank[$a]." WHERE main_id=$athlete_id";
                            $this -> connect() -> query($sql);
                        }

                        if ($points != ''){
                            $point_value = 12;
                            for ($a=0; $a < $amount; $a++){
                                $personally = (int)$all_in_category[$a]['personally'];
                                $out_of_comp = (int)$all_in_category[$a]['out_of_comp'];
                                $athlete_id = (int)$all_in_category[$a]['main_id'];

                                if ($all_in_category[$a][$results] != '0.0' && $out_of_comp === 0 && $personally === 0){

                                    $sql = "UPDATE powerlifting.main_table SET ".$points." = ".$point_value." WHERE main_id=$athlete_id";
                                    $this -> connect() -> query($sql);

                                    switch ($point_value){
                                        case 12:
                                            $point_value = 9;
                                            break;
                                        case 1:
                                            $point_value = 1;
                                            break;
                                        default:
                                            --$point_value;
                                    }
                                } else {
                                    $sql = "UPDATE powerlifting.main_table SET ".$points." = NULL WHERE main_id=$athlete_id";
                                    $this -> connect() -> query($sql);
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>