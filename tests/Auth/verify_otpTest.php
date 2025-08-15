<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../../app/Services/AuthService.php";
require_once __DIR__ . "/../../app/Repositories/AuthRepositories.php";

class Verify_otpTest extends TestCase
{
    private $authRepoMock;
    private $authRepositories;

    public function setUp(): void
    {
        // Start session for all tests
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->authRepoMock = $this->createMock(AuthRepositories::class);
        $this->authRepositories = new AuthService($this->authRepoMock);
    }

    // Test: OTP required
    public function testOtpWithCodeMissing()
    {
        $_SESSION['email'] = 'test@example.com';

        $result = $this->authRepositories->otp(['otp' => '']);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals('OTP is required', $result['error']);
    }

    // Test: Wrong OTP
    public function testWithWrongOtpFail()
    {
        $_SESSION['email'] = 'test@example.com';
        $email = $_SESSION['email'];

        $this->authRepoMock->expects($this->once())
            ->method('getbyemail')
            ->with($email)
            ->willReturn(['otp' => '999999']); // stored OTP

        $result = $this->authRepositories->otp(['otp' => '000000']);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals('Invalid OTP', $result['error']);
    }

    // Test: Correct OTP
    public function testWithCorrectOtpSuccess()
    {
        $_SESSION['email'] = 'test@example.com';
        $email = $_SESSION['email'];
        $otp = '123456';

        $this->authRepoMock->expects($this->once())
            ->method('getbyemail')
            ->with($email)
            ->willReturn(['otp' => $otp]);

        $result = $this->authRepositories->otp(['otp' => $otp]);
        $this->assertArrayHasKey('success', $result);
        $this->assertEquals('success', $result['success']);
    }
}
