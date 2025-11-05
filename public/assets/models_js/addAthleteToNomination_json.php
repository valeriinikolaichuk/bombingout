<?php
    header("Content-Type: application/json");

    require_once __DIR__.'/../../models/connect.php';
    require_once 'addAthleteToNom.php';

    $json = file_get_contents("php://input", false, stream_context_get_default());
    $data = json_decode($json, true);

    $addAthleteToNom = new AddAthleteToNom($data);

    echo json_encode([
    "success" => true,
    "message" => "Дані отримані",
    "data" => $data
]);
?>