<?php
    session_start();

    class ReLogin extends GetData {
        use Registration;

        public function set_session_comp_status($show, $comp_status){
            $number_of_rows = count($show);

            if ($number_of_rows > 0){
                $_SESSION['comp_status'] = $comp_status;
                return 'TRUE'; 
            } else {
                return 'FALSE';
            }
        }
    }
?>