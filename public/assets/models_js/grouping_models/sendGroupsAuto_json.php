<?php
    header("Content-Type: application/json");

    require_once __DIR__.'/../../../models/connect.php';
    require_once 'setGroupsAuto.php';

    $json = file_get_contents("php://input", false, stream_context_get_default());
    $data = json_decode($json, true);

    $setGroupsAuto = new SetGroupsAuto;
    $responce = $setGroupsAuto -> grouping($data);

    echo json_encode($responce);
?>