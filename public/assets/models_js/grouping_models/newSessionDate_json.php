<?php
    header("Content-Type: application/json");
    
    require_once __DIR__.'/../../../models/connect.php';
    require_once 'newSessionDate.php';

    $json = file_get_contents("php://input", false, stream_context_get_default());
    $data = json_decode($json, true);
    $start_time = $data['start_time'] ?? null;

    if (!$start_time){
        http_response_code(400);
        echo json_encode(["error" => "No start_time provided"]);
        exit;
    }

    $sessions_name = $data['sessions_name'];
    $comp_id = (int)$data['comp_id'];
    $start_time_sql = str_replace('T', ' ', $start_time) . ':00';
    $sessionDate = new SessionDate($start_time_sql, $sessions_name, $comp_id);

    echo json_encode($start_time);
?>