<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../app/Services/AuthService.php';
require_once __DIR__ . '/../../app/Repositories/AuthRepositories.php'; // for type hinting

class RegisterTest extends TestCase
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



    public function testRegisterFailWithNameOrEmailOrPasswordMissing()
    {
        $result = $this->authService->register(['password' => '12345678']);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals('Required Failed', $result['error']);

        $result = $this->authService->register(['name' => 'Min THu']);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals('Required Failed', $result['error']);

        $result = $this->authService->register(['password' => '12345678', 'name' => 'Min Thu']);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals('Required Failed', $result['error']);
    }

    public function testRegisterFailWithExistingUser()
    {
        $existingEmail = 'test@example.com';

        $this->authRepoMock
            ->method('getbyemail')
            ->with($existingEmail)
            ->willReturn([
                'id'       => 1,
                'email'    => $existingEmail,
                'name'     => 'John Doe',
                'password' => 'hashedpass'
            ]);

        $result = $this->authService->register([
            'name'     => 'John Doe',
            'email'    => $existingEmail,
            'password' => '12345678'
        ]);

        $this->assertArrayHasKey('error', $result);
        $this->assertEquals('Email is Already Register', $result['error']);
    }

    //no error for register and accept the user register
    public function testSuccessWithUserCorrectEmailAndPassword()
    {
        $name = "user one";
        $email = "userone@example.com";
        $password = "hashedpass";

        $this->authRepoMock->expects($this->once())
            ->method('getbyemail')
            ->with($email)
            ->willReturn(null);

        $this->authRepoMock->expects($this->once())
            ->method('create')
            ->with([
                'name' => $name,
                'email' => $email,
                'password' => base64_encode($password),
            ])
            ->willReturn(true);

        $result = $this->authService->register([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);

        $this->assertArrayHasKey('success', $result);
        $this->assertTrue($result['success']);
        $this->assertEquals("userone@example.com", $result['email']);
    }
}
