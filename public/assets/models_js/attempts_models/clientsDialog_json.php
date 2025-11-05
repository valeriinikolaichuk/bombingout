<?php
    header("Content-Type: application/json");

    require_once __DIR__.'/../../../models/connect.php';
    require_once __DIR__.'/../../../models/getData.php';
    require_once 'clientsDialog.php';

    $json = file_get_contents("php://input", false, stream_context_get_default());
    $data = json_decode($json, true);

    $clientsDialog = new ClientsDialog;
    $responce = $clientsDialog -> show_clients($data);

    echo json_encode($responce);
?>