<?php
    header("Content-Type: application/json");

    require_once __DIR__.'/../../../models/connect.php';
    require_once 'deleteOldSession.php';

    $json = file_get_contents("php://input", false, stream_context_get_default());
    $data = json_decode($json, true);

    $id_user = $data['id_user'];
    $id_status = $data['id_status'];

    $deleteOldSession = new DeleteOldSession($id_user, $id_status);

    echo json_encode('ok');
?>