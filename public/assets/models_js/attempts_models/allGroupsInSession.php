<?php
    class AllGroupsInSession extends GetData {
        public function getGroupsInSession($compID, $sessions_name){
            $sql = "SELECT DISTINCT grp FROM powerlifting.sessions_table 
            WHERE all_sessions = (
                SELECT all_sessions FROM powerlifting.sessions_table 
                WHERE sessions_name = '$sessions_name' AND comp_id = $compID LIMIT 1
            ) AND comp_id = $compID";
            $groups = $this -> getData($sql);

            return $groups;
        }
    }
?>