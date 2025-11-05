<?php
    header("Content-Type: application/json");

    require_once __DIR__.'/../../../models/connect.php';
    require_once __DIR__.'/../../../models/getData.php';
    require_once 'sidePanelData.php';

    $json = file_get_contents("php://input", false, stream_context_get_default());
    $data = json_decode($json, true);
    $dataVal = $data['id'];

    $sidePanelData = new SidePanelData;
    $responce = $sidePanelData -> getSidePanelData($dataVal);

    echo json_encode($responce);
?>