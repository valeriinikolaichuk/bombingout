<?php
    header("Content-Type: application/json");

    require_once __DIR__.'/../../../models/connect.php';
    require_once __DIR__.'/../../../models/getData.php';
    require_once 'checkNomination.php';
    require_once 'createNomination.php';

    $json = file_get_contents("php://input", false, stream_context_get_default());
    $data = json_decode($json, true);
    $check = count($data);
    if ($check == 1){
        $jsonCheckNomination = new CheckNomination;
        $jsonCheckNomin = $jsonCheckNomination -> check($data[0]);
        if ($jsonCheckNomin == 'nomination'){
            $responce = 'the nomination already exists';
        } else {
            $responce = 'open nomin modal';
        }
    } else {
        $jsonCreateNomination = new CreateNomination;
        $jsonCreateNomination -> createNomination($data[0], $data[1], $data[2]);
        $responce = 'the nomination was created';
    }

    echo json_encode($responce);
?>