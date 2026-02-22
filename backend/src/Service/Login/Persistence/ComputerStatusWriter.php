<?php
    namespace App\Service\Login\Persistence;

    use App\Entity\ComputerStatus;
    use Doctrine\ORM\EntityManagerInterface;

    class ComputerStatusWriter {
        public function __construct(private EntityManagerInterface $em) {}

        public function saveData(
            int $userId,
            string $status,
            string $language,
            ?string $ip,
            ?string $agent
        ): int {

            $record = new ComputerStatus();
            $record -> setUserId($userId);
            $record -> setUsersStatus($status);
            $record -> setLang($language);
            $record -> setIpAddress($ip);
            $record -> setUserAgent($agent);

            $this -> em ->persist($record);
            $this -> em ->flush();

            return $record -> getId();
        }
    }
?>