<?php
    class ChangeLanguage extends GetSessionsValues {
        public function change_language($newLang, $id_status){
            $sql = "UPDATE powerlifting.computer_status SET lang = '$newLang' WHERE id_status = $id_status";
            $this -> connect() -> query($sql);

            $sessLang = $this -> sessionsValues('lang', $id_status);
            $lang = $sessLang[0]['lang'];

            $this -> connect() -> close();

            return $lang;
        }
    }
?>