<?php
    header("Content-Type: application/json");

    require_once __DIR__.'/../../../models/connect.php';
    require_once __DIR__.'/../../../models/getData.php';
    require_once __DIR__.'/../../../models/groupsCategories.php';
    require_once 'showAllBars.php';
    require_once 'allGroupsInSession.php';

    $json = file_get_contents("php://input", false, stream_context_get_default());
    $data = json_decode($json, true);

    $attempts_table = new ShowAllBars;
    $attempts_table -> compId = (int)$data['compID'];
    $attempts_table -> sessions_name = $data['sessions_name'];
    $sessions_data = $attempts_table -> get_groups_categories();
    $current_group = (int)$sessions_data[0]["grp"];

    $allGroups_inSession = new AllGroupsInSession;
    $groups = $allGroups_inSession -> getGroupsInSession((int)$data['compID'], $data['sessions_name']);
    $number_of_groups = count($groups);
    if ($number_of_groups > 1 && $current_group != $number_of_groups){
        $allGroups = array();
        for ($a=0; $a < $number_of_groups; $a++){
            $allGroups[$a] = (int)$groups[$a]["grp"];
        }

        $currentIndex = array_search($current_group, $allGroups);

        if ($currentIndex !== false && isset($allGroups[$currentIndex + 1])){
            $attempts_table -> compId = (int)$data['compID'];
            $attempts_table -> sessions_name = preg_replace_callback('/(\d+)grp$/', 
                function($matches){
                    return ($matches[1] + 1) . "grp";
                }, $data['sessions_name']);

            $next_sessions_data = $attempts_table -> get_groups_categories();
            $string = $attempts_table -> string($next_sessions_data);
            $next_group = $allGroups[$currentIndex + 1];

            $value_next = $attempts_table -> get_attempts($data['discipline'], 1, (int)$data['compID'], $next_group, $string);
            $result = array_values($value_next);

            echo json_encode($result);

        } else {
            echo json_encode('no groups found');
        }
    } else {
        echo json_encode('no groups found');
    }
?>