<?php
    session_start();
    header("Content-Type: application/json");

    if (isset($_SESSION['id_status'])) {
        echo json_encode(["status" => "alive"]);
    } else {
        echo json_encode(["status" => "expired"]);
    }
?>