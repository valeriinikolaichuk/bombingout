<?php
    header("Content-Type: application/json");

    require_once __DIR__.'/../../../models/connect.php';
    require_once __DIR__.'/../../../models/getData.php';
    require_once __DIR__.'/../../../models/groupsCategories.php';
    require_once 'showAllBars.php';

    $json = file_get_contents("php://input", false, stream_context_get_default());
    $data = json_decode($json, true);

    $attempts_table = new ShowAllBars;
    $value = $attempts_table -> all_weights($data);
    $result = array_values($value);

    echo json_encode($result);
?>