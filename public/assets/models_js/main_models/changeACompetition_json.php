<?php
    header("Content-Type: application/json");

    require_once __DIR__.'/../../../models/connect.php';
    require_once 'changeCompetitionsData.php';

    $json = file_get_contents("php://input", false, stream_context_get_default());
    $data = json_decode($json, true);

    $jsonChangeCompetitionsData = new ChangeCompetitionsData;
    $jsonChangeCompetitionsData -> set_data($data);

    $responce = 'the competition data has been updated';
    echo json_encode($responce);
?>