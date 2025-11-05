<?php
    class SessionDate extends Connect {
        public function __construct($date, $sessions_name, $comp_id){
            $sql="UPDATE powerlifting.sessions_table SET dateTime = CAST('$date' AS DATETIME) 
                WHERE all_sessions = '$sessions_name' AND comp_id = $comp_id";
            $this -> connect() -> query($sql);
            $this -> connect() -> close();
        }
    }
?>