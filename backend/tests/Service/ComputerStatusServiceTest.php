<?php

namespace App\Tests\Service;

use App\Entity\UserReg;
use App\Service\ComputerStatusService;
use Doctrine\DBAL\Connection;
use PHPUnit\Framework\TestCase;

class ComputerStatusServiceTest extends TestCase{
    public function testCreateStatus(){
        $db = $this -> createMock(Connection::class);
        $user = $this -> createMock(UserReg::class);

        $user -> method('getId') -> willReturn(5);
        $user -> method('getStatus') -> willReturn('admin');

        $db -> expects($this -> once())
            -> method('executeStatement')
            -> with(
                $this -> stringContains("INSERT INTO powerliftingsymfony.computer_status"),
                [
                    'id_user'      => 5,
                    'users_status' => 'admin',
                    'lang'         => 'en',
                ]
            );

        $db -> expects($this->once())
            -> method('fetchOne')
            -> with(
                $this -> stringContains("SELECT MAX(id_status)"),
                ['id_user' => 5]
            )
            -> willReturn(42);

        $service = new ComputerStatusService($db);
        $result = $service->createStatus($user, 'en');

        $this->assertEquals(42, $result);
    }
}
