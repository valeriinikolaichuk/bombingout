<?php
    header("Content-Type: application/json");

    require_once __DIR__.'/../../../models/connect.php';
    require_once __DIR__.'/../../../models/getData.php';
    require_once 'checkSession.php';

    $json = file_get_contents("php://input", false, stream_context_get_default());
    $data = json_decode($json, true);

    $id_user = (int)$data['id_user'];
    $id_status = (int)$data['id_status'];

    $checkSession = new CheckSession;
    $old_sessions = $checkSession -> check_session($id_user, $id_status);

    $previous_client = array();
    if (!empty($old_sessions)){
        $previous_client['id_status'] = $old_sessions[0]['id_status'];
        $previous_client['lang'] = $old_sessions[0]['lang'];
    }

    echo json_encode($previous_client);
?>