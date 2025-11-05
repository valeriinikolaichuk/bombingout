<?php
    header("Content-Type: application/json");

    require_once __DIR__.'/../../../models/connect.php';
    require_once 'deleteACompetition.php';

    $json = file_get_contents("php://input", false, stream_context_get_default());
    $compIdDelete = json_decode($json, true);

    $deleteACompetition = new DeleteACompetition;
    $deleteACompetition -> delete_a_competition('main_table', $compIdDelete);
    $deleteACompetition -> delete_a_competition('competitions', $compIdDelete);
    $deleteACompetition -> delete_a_competition('sessions_table', $compIdDelete);
    $deleteACompetition -> delete_from_computer_status($compIdDelete);

    $responce = 'the competition was deleted';
    echo json_encode($responce);
?>