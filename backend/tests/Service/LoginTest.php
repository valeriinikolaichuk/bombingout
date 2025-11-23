<?php

namespace App\Tests\Service;

use App\Entity\UserReg;
use App\Service\Login;
use App\Service\SessionService;
use App\Service\ComputerStatusService;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class LoginTest extends TestCase {
    public function testLoginUserForAdmin() {
        $session = $this -> createMock(SessionInterface::class);
        $user = $this -> createMock(UserReg::class);

        $sessionService = $this -> createMock(SessionService::class);
        $computerStatusService = $this -> createMock(ComputerStatusService::class);

        $user -> method('getStatus') -> willReturn('admin');

        $sessionService -> expects($this -> once())
            -> method('setUserSession')
            -> with($session, $user, 'en');

        $session -> method('has') -> with('id_status') -> willReturn(false);

        $computerStatusService -> expects($this -> once())
            -> method('createStatus')
            -> with($user, 'en')
            -> willReturn(77);

        $session -> expects($this -> once())
            -> method('set')
            -> with('id_status', 77);

        $service = new Login($sessionService, $computerStatusService);
        $service -> loginUser($session, $user, 'en');
    }
}
