<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../app/Services/AuthService.php';
require_once __DIR__ . '/../../app/Repositories/AuthRepositories.php'; // for type hinting

class LoginTest extends TestCase
{
    private $authRepoMock;
    private $authService;

    protected function setUp(): void
    {
        // Create mock for AuthRepositories
        $this->authRepoMock = $this->createMock(AuthRepositories::class);

        // Inject mock into AuthService
        $this->authService = new AuthService($this->authRepoMock);
    }

    public function testLoginReturnsErrorWhenEmailOrPasswordMissing()
    {
        $result = $this->authService->login(['email' => '', 'password' => '']);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals('Email and password are required.', $result['error']);

        $result = $this->authService->login(['email' => 'user@example.com']);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals('Email and password are required.', $result['error']);
    }
    public function testLoginReturnsErrorWhenUserNotFound()
    {
        $email = 'notfound@example.com';

        // Mock getbyemail() to return null
        $this->authRepoMock->expects($this->once())
            ->method('getbyemail')
            ->with($email)
            ->willReturn(null);

        $result = $this->authService->login(['email' => $email, 'password' => 'any']);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals('User not Found', $result['error']);
    }

    public function testLoginReturnsErrorWhenPasswordInvalid()
    {
        $email = 'user@example.com';
        $hashedPassword = password_hash('correct_password', PASSWORD_DEFAULT);

        // Mock getbyemail() to return user data with hashed password
        $this->authRepoMock->expects($this->once())
            ->method('getbyemail')
            ->with($email)
            ->willReturn([
                'id' => 1,
                'email' => $email,
                'password' => $hashedPassword,
                'name' => 'User One',
            ]);

        $result = $this->authService->login(['email' => $email, 'password' => 'wrong_password']);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals('Invalid password', $result['error']);
    }

    public function testLoginReturnsSuccessWhenCredentialsValid()
    {
        //required test mail 
        $plainPassword = 'userpassword123';
        $encodedPassword = base64_encode($plainPassword);

        $this->authRepoMock->method('getbyemail')
            ->willReturn([
                'id'       => 1,
                'email'    => 'test@example.com',
                'name'     => 'John Doe',
                'password' => $encodedPassword
            ]);

        $result = $this->authService->login([
            'email'    => 'test@example.com',
            'password' => $plainPassword
        ]);

        $this->assertArrayHasKey('success', $result);
        $this->assertTrue($result['success']);
        $this->assertEquals('test@example.com', $result['email']);
    }
}
