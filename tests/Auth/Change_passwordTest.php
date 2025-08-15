<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../../app/Services/AuthService.php";
require_once __DIR__ . "/../../app/Repositories/AuthRepositories.php";

class Change_passwordTest extends TestCase
{
    private $authRepoMock;
    private $authService;

    public function setUp(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->authRepoMock = $this->createMock(AuthRepositories::class);
        $this->authService = new AuthService($this->authRepoMock);
    }

    // Missing required fields
    public function testErrorCurrentConfirmPasswordMissing()
    {
        $data = ['new' => '', 'confirm' => ''];
        $result = $this->authService->changepassword($data);

        $this->assertArrayHasKey('error', $result);
        $this->assertEquals('Password is required', $result['error']);
    }

    // New and confirm don't match
    public function testNotSameConfirmAndNewPasswordNotSame()
    {
        $data = ['new' => 'abc123', 'confirm' => 'xyz789'];
        $result = $this->authService->changepassword($data);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals("Password do not match", $result['error']);
    }

    // Success case
    public function testNewAndConfirmPasswordSuccess()
    {
        $_SESSION['email'] = 'test@example.com';
        $userId = '1';
        $data = [
            'new'     => 'newpass123',
            'confirm' => 'newpass123'
        ];

        // Mock getbyemail
        $this->authRepoMock->expects($this->once())
            ->method('getbyemail')
            ->with($_SESSION['email'])
            ->willReturn(['id' => $userId]);

        // Mock changepassword — expect id as first arg, and password array as second
        $this->authRepoMock->expects($this->once())
            ->method('changepassword')
            ->with(
                $this->equalTo($userId),
                $this->equalTo(['password' => base64_encode($data['new'])])
            )
            ->willReturn(true);

        $result = $this->authService->changepassword($data);

        $this->assertArrayHasKey('success', $result);
        $this->assertTrue($result['success']);
    }
}
