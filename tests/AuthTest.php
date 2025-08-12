<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../app/config/config.php';

require_once __DIR__ . '/../app/libraries/Controller.php';
require_once __DIR__ . '/../app/libraries/Database.php';
require_once __DIR__ . '/../app/controllers/Auth.php';
require_once __DIR__ . '/../app/Services/AuthService.php';
require_once __DIR__ . '/../app/contracts/AuthInterface.php';

class AuthTest extends TestCase
{
    private $authRepoMock;
    private $authService;
    private $authController;

    protected function setUp(): void
    {
        // Mock repository, not service
        $this->authRepoMock = $this->createMock(AuthInterface::class);

        // Real service with mocked repository
        $this->authService = new AuthService($this->authRepoMock);

        // Controller with real service
        $this->authController = new Auth($this->authService);
    }

    public function testLoginReturnsErrorWhenUserNotFound()
    {
        $email = 'notfound@example.com';
        $password = 'anyPassword';

        // Mock repository getbyemail() to return null (user not found)
        $this->authRepoMock->expects($this->once())
            ->method('getbyemail')
            ->with($email)
            ->willReturn(null);

        // Call login with email and password
        $result = $this->authService->login([
            'email' => $email,
            'password' => $password,
        ]);

        $this->assertArrayHasKey('error', $result);
        $this->assertEquals('User not found', $result['error']);
    }

    public function testLoginReturnsErrorWhenPasswordInvalid()
    {
        $email = 'user@example.com';
        $correctPasswordHash = password_hash('correctPassword', PASSWORD_DEFAULT);

        // Mock repository returns user with hashed password
        $this->authRepoMock->expects($this->once())
            ->method('getbyemail')
            ->with($email)
            ->willReturn([
                'id' => 1,
                'email' => $email,
                'password' => $correctPasswordHash,
                'name' => 'User One',
            ]);

        $result = $this->authService->login([
            'email' => $email,
            'password' => 'wrongPassword',
        ]);

        $this->assertArrayHasKey('error', $result);
        $this->assertEquals('Invalid password', $result['error']);
    }

    public function testLoginReturnsSuccessWhenCredentialsValid()
    {
        $email = 'user@example.com';
        $plainPassword = 'correctPassword';
        $correctPasswordHash = password_hash($plainPassword, PASSWORD_DEFAULT);

        $this->authRepoMock->expects($this->once())
            ->method('getbyemail')
            ->with($email)
            ->willReturn([
                'id' => 1,
                'email' => $email,
                'password' => $correctPasswordHash,
                'name' => 'User One',
            ]);

        $result = $this->authService->login([
            'email' => $email,
            'password' => $plainPassword,
        ]);

        $this->assertArrayHasKey('success', $result);
        $this->assertTrue($result['success']);
        $this->assertEquals($email, $result['email']);
        $this->assertEquals('User One', $result['name']);
    }
}
