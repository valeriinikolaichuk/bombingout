<?php
    session_start();
    header("Content-Type: application/json");

    require_once __DIR__.'/../../models/connect.php';
    require_once __DIR__.'/../../models/getData.php';
    require_once 'registrationOfNewUser.php';

    $json = file_get_contents("php://input", false, stream_context_get_default());
    $data = json_decode($json, true);

    if ($data['status'] == 'participant'){
        $_SESSION['participant'] = 'open';
    } else {
        $_SESSION['all_users'] = 'open';
    }

    $registrationOfNewUser = new RegistrationOfNewUser;

    $login = $data['login'];
    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
    $condition = "user='$login'";
    $newLogin = $registrationOfNewUser -> checkNewData($condition);

    $password = $data['password'];
    $password = htmlentities($password, ENT_QUOTES, "UTF-8");
    $condition = "password='$password'";
    $newPassword = $registrationOfNewUser -> checkNewData($condition);

    if (!empty($newLogin) && !empty($newPassword)){
        echo json_encode('FALSE');
    } else {
        $registrationOfNewUser -> addUser($data);
        echo json_encode('TRUE');
    }
?>