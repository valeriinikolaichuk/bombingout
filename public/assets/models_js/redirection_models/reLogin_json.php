<?php
    header("Content-Type: application/json");

    require_once __DIR__.'/../../../models/connect.php';
    require_once __DIR__.'/../../../models/getData.php';
    require_once '../registration.php';
    require_once 'reLogin.php';

    $json = file_get_contents("php://input", false, stream_context_get_default());
    $data = json_decode($json, true);

    $login = new ReLogin;
    $show = $login -> checkLogin($data);
    $comp_status = $data['compStatus'];
    $result = $login -> set_session_comp_status($show, $comp_status);

    echo json_encode($result);
?>