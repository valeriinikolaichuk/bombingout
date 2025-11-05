<?php
    class ShowAllBars extends GetData {
        use GroupsCategories;

        private $allGroups_inSession;

        public function all_weights($data){
            $discipline = $data['discipline'];
            $attempt = (int)$data['attempt'];
            $sessions_name = $data['sessions_name'];
            $compID = (int)$data['compID'];

            $sql = "UPDATE powerlifting.computer_status SET sessions_name = '$sessions_name', discipline = '$discipline', 
                attempt = $attempt, realtime = NOW() WHERE comp_id = $compID";
            $this -> connect() -> query($sql);

            $this -> compId = $compID;
            $this -> sessions_name = $sessions_name;
            $sessions_data = $this -> get_groups_categories();

            $grp = $sessions_data[0]["grp"];
            $string = $this -> string($sessions_data);

            $value = $this -> get_attempts($discipline, $attempt, $compID, $grp, $string);

            return $value;
        }

        public function get_attempts($discipline, $attempt, $compID, $grp, $string){
            $sql="SELECT main_id, surname_name, bodyweight, category, category_num, lot, ".$discipline."_1, ".$discipline."_1_CSS, ".$discipline."_2, ".$discipline."_2_CSS, ".$discipline."_3, ".$discipline."_3_CSS, ".$discipline."_4, ".$discipline."_4_CSS  
                FROM powerlifting.main_table WHERE comp_id=$compID AND ".$discipline."_".$attempt."_CSS='color: #000000;' AND grp=$grp ".$string.") 
                ORDER BY ".$discipline."_".$attempt.", lot";  
            $chosen_weights = $this -> getData($sql);

            $sql="SELECT main_id, surname_name, bodyweight, category, category_num, lot, ".$discipline."_1, ".$discipline."_1_CSS, ".$discipline."_2, ".$discipline."_2_CSS, ".$discipline."_3, ".$discipline."_3_CSS, ".$discipline."_4, ".$discipline."_4_CSS  
                FROM powerlifting.main_table WHERE comp_id=$compID AND ".$discipline."_".$attempt."_CSS!='color: #000000;' AND grp=$grp ".$string.") 
                ORDER BY ".$discipline."_".$attempt.", lot";
            $results = $this -> getData($sql);

            $start = count($chosen_weights);
            $second = count($results);
            $end = $start + $second;
            $all_weights = $chosen_weights;

            $b = 0;
            for ($a=$start; $a < $end; $a++){
                $all_weights[$a] = $results[$b];
                ++$b;
            }

            $value = $this -> checkZero($all_weights, $attempt, $discipline);
            $this -> connect() -> close();

            return $value;
        }

        private function checkZero($value, $attempt, $lift){
            $attemptColor_1 = $lift.'_1_CSS';
            $attemptColor_2 = $lift.'_2_CSS';
            $attemptColor_3 = $lift.'_3_CSS';
            $attemptColor_4 = $lift.'_4_CSS';
            $lift_1 = $lift.'_1';
            $lift_2 = $lift.'_2';
            $lift_3 = $lift.'_3';
            $lift_4 = $lift.'_4';

            $numOfTableRows = count($value);
            if ($numOfTableRows > 0){
                $checkZero = array();
                switch ($attempt){
                    case 1:
                        for ($c=0; $c < $numOfTableRows; $c++){
                            $checkZero[$c] = $value[$c][$lift_1];
                        }
                        break;
                    case 2:
                        for ($c=0; $c < $numOfTableRows; $c++){
                            $checkZero[$c] = $value[$c][$lift_2];
                        }
                        break;
                    case 3:
                        for ($c=0; $c < $numOfTableRows; $c++){
                            $checkZero[$c] = $value[$c][$lift_3];
                        }
                        break;
                    default:
                        for ($c=0; $c < $numOfTableRows; $c++){
                            $checkZero[$c] = $value[$c][$lift_4];
                        }
                }
            }

            $sorted_value = array();
            if ($numOfTableRows > 0){        
                for ($c=0; $c < $numOfTableRows; $c++){
                    if ($checkZero[$c] > 0){
                        $sorted_value[$c] = $value[$c];
                    }
                }

                for ($c=0; $c < $numOfTableRows; $c++){
                    if ($checkZero[$c] == 0){
                        $sorted_value[$c] = $value[$c];
                    }
                }
            }

            return $sorted_value;
        }
    }
?>