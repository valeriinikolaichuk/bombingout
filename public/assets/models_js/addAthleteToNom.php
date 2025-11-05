<?php
    class AddAthleteToNom extends Connect {
        public function __construct($data){
            $surname_name = $data['surname_name'] ?? '';
            $date_of_birth = $data['date_of_birth'] ?? '';
            $category = $data['category'] ?? '';
            $region = $data['region'] ?? '';
            $city = $data['city'] ?? '';
            $club = $data['club'] ?? '';
            $trener_1 = $data['trener_1'] ?? '';
            $trener_2 = $data['trener_2'] ?? '';
            $trener_3 = $data['trener_3'] ?? '';
            $trener_4 = $data['trener_4'] ?? '';
            $squat_nom = $data['squat_nom'] ?? 0;
            $bench_press_nom = $data['bench_press_nom'] ?? 0;
            $deadlift_nom = $data['deadlift_nom'] ?? 0;
            $total_nom = $data['total_nom'] ?? 0;
            $comp_nomin_id = $data['comp_nomin_id'] ?? 0;

            $category_correct = $category;
            if ($category_correct == "67,5 kg"){
                $category_correct = "67 kg";
            }

            if ($category_correct == "82,5 kg"){
                $category_correct = "82 kg";
            }

            if ($category_correct == "100+ kg"){
                $category_correct = "101 kg";
            }

            if ($category_correct == "125+ kg"){
                $category_correct = "126 kg";
            }
            
            $category_num = trim($category_correct, " kg");

            $sql="INSERT INTO powerlifting.main_table (surname_name, date_of_birth, category, category_num, region, city, 
                club, trener_1, trener_2, trener_3, trener_4, squat_nom, bench_press_nom, deadlift_nom, total_nom, comp_id) 
                VALUES ('$surname_name', CAST('$date_of_birth' AS DATE), '$category', CAST('$category_num' AS INT), '$region', 
                '$city', '$club', '$trener_1', '$trener_2', '$trener_3', '$trener_4', CAST($squat_nom AS DECIMAL(4,1)), 
                CAST($bench_press_nom AS DECIMAL(4,1)), CAST($deadlift_nom AS DECIMAL(4,1)), CAST($total_nom AS DECIMAL(5,1)), 
                CAST($comp_nomin_id AS INT))";

            $this -> connect() -> query($sql);
            $this -> connect() -> close();
        }
    }
?>