<?php
    header("Content-Type: application/json");

    require_once __DIR__.'/../../../models/connect.php';
    require_once __DIR__.'/../../../models/getData.php';
    require_once '../allResults.php';
    require_once 'setParticipantsData.php';
    require_once __DIR__.'/../../../models/models_admin/getMainTableData.php';

    $json = file_get_contents("php://input", false, stream_context_get_default());
    $data = json_decode($json, true);

    $json_SetParticipantsData = new SetParticipantsData;
    $athlete_id = $json_SetParticipantsData -> set_competitions_data($data);

    $getAthleteData = new GetMainTableData;
    $length = count($athlete_id);
    for ($a=0; $a < $length; $a++){
        $condition = 'main_id='.$athlete_id[$a];
        $responce[$a] = $getAthleteData -> select($condition);
    }

    echo json_encode($responce);
?>