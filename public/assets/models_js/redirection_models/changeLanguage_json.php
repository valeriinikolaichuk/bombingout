<?php
    header("Content-Type: application/json");

    require_once __DIR__.'/../../../models/connect.php';
    require_once __DIR__.'/../../../models/getData.php';
    require_once __DIR__.'/../../../models/getSessionsValues.php';
    require_once 'changeLanguage.php';

    $json = file_get_contents("php://input", false, stream_context_get_default());
    $data = json_decode($json, true);

    $newLang = $data['newLang'];
    $id_status = (int)$data['id_status'];

    $changeLanguage = new ChangeLanguage;
    $lang = $changeLanguage -> change_language($newLang, $id_status);

    echo json_encode($lang);
?>