<?php

namespace App\Tests\Service;

use App\Entity\UserReg;
use App\Service\LoginSessionService;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class LoginSessionServiceTest extends TestCase{
    public function testSetUserSessionForRegularUser(){
        $session = $this -> createMock(SessionInterface::class);
        $user = $this -> createMock(UserReg::class);

        $user -> method('getId') -> willReturn(1);
        $user -> method('getStatus') -> willReturn('admin');

        $session -> expects($this -> exactly(4))
            -> method('set')
            -> withConsecutive(
                ['id', 1],
                ['status', 'admin'],
                ['language', 'en']
            );

        $session -> expects($this -> once()) -> method('save');

        $service = new LoginSessionService();
        $service -> setUserSession($session, $user, 'en');
    }
}
