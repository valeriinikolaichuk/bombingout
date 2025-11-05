<?php
    header("Content-Type: application/json");

    require_once __DIR__.'/../../models/connect.php';
    require_once __DIR__.'/../../models/getData.php';
    require_once 'registration.php';
    require_once __DIR__.'/../../models/checkInTable.php';
    require_once 'login.php';

    $json = file_get_contents("php://input", false, stream_context_get_default());
    $data = json_decode($json, true);

    $login = new Login;
    $show = $login -> checkLogin($data);
    $language = $data['language'];
    $login -> set_session_variables($show, $language);

    echo json_encode($show);
?>