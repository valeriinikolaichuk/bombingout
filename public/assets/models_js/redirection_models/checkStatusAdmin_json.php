<?php
    header("Content-Type: application/json");

    require_once __DIR__.'/../../../models/connect.php';
    require_once __DIR__.'/../../../models/getData.php';
    require_once 'checkStatusAdmin.php';

    $json = file_get_contents("php://input", false, stream_context_get_default());
    $data = json_decode($json, true);
    $users_ID = (int)$data;

    $checkStatusAdmin = new CheckStatusAdmin;
    $statusValue = $checkStatusAdmin -> checkAdmin('comp_status', $users_ID);
    if (is_array($statusValue) && !empty($statusValue)){
        $result = $statusValue[0]['comp_status'];
    } else {
        $result = 'not found';
    }

    echo json_encode($result);
?>