<?php
    header("Content-Type: application/json");

    session_start();

    require_once __DIR__.'/../../../models/connect.php';
    require_once __DIR__.'/../../../models/getData.php';
    require_once __DIR__.'/../../../models/getSessionsValues.php';
    require_once 'setCompetitions_id.php';
    require_once 'createCompetitionsData.php';
    require_once 'popupCreate.php';

    $json = file_get_contents("php://input", false, stream_context_get_default());
    $data = json_decode($json, true);

    $jsonpopupCreate = new PopupCreate($data);

    $responce = 'the competition was created';
    echo json_encode($responce);
?>