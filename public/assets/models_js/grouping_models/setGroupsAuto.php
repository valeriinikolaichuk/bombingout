<?php
    class SetGroupsAuto extends Connect {
        public function grouping($data){
            $number_of_groups = $data[0];
            $numberOf_participants = count($data) - 1;

            if ($number_of_groups > $numberOf_participants){
                $number_of_groups = $numberOf_participants;
            }

            $number_of_partisipants = array();
            $numberOfSportsmenInGroup = $numberOf_participants / $number_of_groups;  
            $numberOfSportsmenInGrpMax = ceil($numberOfSportsmenInGroup);  
            $all_in_SessionMax = $numberOfSportsmenInGrpMax * $number_of_groups; 
        
            for ($a=0; $a < $number_of_groups; $a++){
                $number_of_partisipants[$a] = $numberOfSportsmenInGrpMax; 
            }

            $substraction = $all_in_SessionMax - $numberOf_participants; 

            if ($substraction > 0){
                for ($a=0; $a < $substraction; $a++){
                    $number_of_partisipants[$a] = $numberOfSportsmenInGrpMax - 1; 
                }
            }

            $num_of_partisipants = array();
            $num_of_partisipants[0] = $number_of_partisipants[0];

            if ($number_of_groups > 1){
                $a1=0;
                for ($a2=1; $a2 < $number_of_groups; $a2++){
                    $num_of_partisipants[$a2] = $num_of_partisipants[$a1] + $number_of_partisipants[$a2];
                       ++$a1;
                }
            }

            $a3=0;
            $a4=1;
            $a5=0;
            while ($a3 < $number_of_groups){
                while ($a5 < $num_of_partisipants[$a3]){
                    $grp[$a5] = $a4;
                    ++$a5;
                }
                ++$a3;
                ++$a4;
            }

            $b = 1;
            $id = array();
            for ($a=0; $a < $numberOf_participants; $a++){
                $id[$a] = $data[$b];
                $sql="UPDATE powerlifting.main_table SET grp = '$grp[$a]' WHERE main_id='$id[$a]'";
                $this -> connect() -> query($sql);
                ++$b;
            }

            $this -> connect() -> close();

            $responce = array();
            foreach ($id as $index => $idValue) {
                $responce[] = [
                    'id' => $idValue,
                    'newValue' => $grp[$index]
                ];
            }

            return $responce;
        }
    }
?>