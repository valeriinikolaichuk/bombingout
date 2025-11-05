<?php
    header("Content-Type: application/json");

    require_once __DIR__.'/../../../models/connect.php';
    require_once __DIR__.'/../../../models/getData.php';
    require_once '../allResults.php';
    require_once 'goodLift.php';
    require_once __DIR__.'/../../../models/groupsCategories.php';
    require_once 'showAllBars.php';

    $json = file_get_contents("php://input", false, stream_context_get_default());
    $data = json_decode($json, true);
    $key = array_keys($data);

    $goodLift = new GoodLift;

    if ($data['good_no_lift'] != 'score_data'){
        $main_id = (int)$data['main_id_score'];

        foreach ($key as $k){
            if (str_contains($k, 'CSS')){
                $attemptColor = $k;
            } elseif (preg_match('/(squat|bench|deadlift)/i', $k)){
                $discipline = $k;
            }
        }

        if ($data['good_no_lift'] == 'goodLift' && $data[$discipline] != '0'){
            $goodLift -> goood_lift($main_id, $data, $attemptColor, $discipline);
        } elseif ($data['good_no_lift'] == 'cancel_att'){
            $goodLift -> cancel_att($main_id, $data, $attemptColor, $discipline);
        } else {
            $goodLift -> no_lift($main_id, $data, $attemptColor, $discipline);
        }
    } else {
        $numberOfRows = count($data['main_id_score']);

        if (isset($data[$data['discipline'].'_1']) && !isset($data[$data['discipline'].'_2']) && 
            !isset($data[$data['discipline'].'_3']) && !isset($data[$data['discipline'].'_4']))
        {
            $attemptColor = $data['discipline'].'_1_CSS';
            $discipline = $data['discipline'].'_1';
            $batchData = [];

            for ($a = 0; $a < $numberOfRows; $a++) {
                if ($data[$attemptColor][$a] == 'color: #000000;'){
                    $batchData[(int)$data['main_id_score'][$a]] = $data[$discipline][$a];
                }
            }

            $goodLift -> set_attempts_first_batch($batchData, $data['discipline']);
        } else {
            $batchDataAll = [];
            for ($n = 1; $n <= 4; $n++) {
                $attemptColor = $data['discipline'].'_'.$n.'_CSS';
                $disciplineCol = $data['discipline'].'_'.$n;

                for ($a = 0; $a < $numberOfRows; $a++) {
                    $mainId = (int)$data['main_id_score'][$a];
                    $batchDataAll[$mainId][$disciplineCol] = $data[$disciplineCol][$a];
                }
            }

            $goodLift -> set_attempts_batch_all($batchDataAll, $data['discipline']);
        }

        $goodLift -> set_attempts_forecast($data['main_id_score'], $data['discipline'], (int)$data['compID'], $data['category_num']);
    }

    $attempts_table = new ShowAllBars;

    $data_for_update = [
        'discipline' => $data['discipline'],
        'attempt' => $data['attempt'],
        'sessions_name' => $data['sessions_name'],
        'compID' => $data['compID']
    ];

    if (isset($data['current_attempt'])){
        $data_for_update['attempt'] = $data['current_attempt'];
    }

    $value = $attempts_table -> all_weights($data_for_update);
    $result = array_values($value);

    echo json_encode($result);
?>