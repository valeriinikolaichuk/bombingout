<?php
    namespace App\Service\ModelsJavascript;

    use Doctrine\DBAL\Connection;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;
    use App\Entity\UserReg;
    use App\Service\CheckInTable;

    class Login {
        public function __construct(private Connection $db) {}

        public function setSessionVariables(
            SessionInterface $session, 
            UserReg $user, 
            CheckInTable $checkInTable, 
            string $language): void {
            if ($user){
                if (!$session -> has('id_status')){
                    $session -> set('id', $user -> getId());
                    $session -> set('status', $user -> getStatus());
                    $session -> set('language', $language);

                    if ($user -> getStatus() !== 'participant'){
                        $id_user = $user -> getId();
                        $users_status = $user -> getStatus();
                        $this -> db -> executeStatement(
                            "INSERT INTO powerliftingsymfony.computer_status (users_ID, users_status, lang)
                            VALUES (:id_user, :users_status, :lang)",
                            [
                                'id_user'      => $id_user,
                                'users_status' => $users_status,
                                'lang'         => $language,
                            ]
                        );

                        $idStatus = (int)$this -> db -> fetchOne(
                            "SELECT MAX(id_status) FROM powerliftingsymfony.computer_status WHERE users_ID = :id_user",
                            ['id_user' => $id_user]
                        );

                        $session -> set('id_status', $idStatus);
                    } else {
                        $session -> set('nominations_id', $user -> getNominationsId());        
                    }

                    if ($session -> has('error_log_in')){
                        $session -> remove('error_log_in');
                    }
                } else {
                    $id_status = $session -> get('id_status');
                    $result = $checkInTable -> checkInTable($id_status);

                    if (empty($result)) {
                        $session -> clear();
                    }
                }

                $session->save();
            }  
        }
    }
?>
