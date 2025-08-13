<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../../app/Services/AuthService.php";
require_once __DIR__ . "/../../app/Repositories/AuthRepositories.php";

class Change_passwordTest extends TestCase
{
    private $authRepoMock;
    private $authRepositories;

    public function setUp(): void
    {
        //create fake mock 
        $this->authRepoMock = $this->createMock(AuthRepositories::class);

        //create repositore to use function in repo
        $this->authRepositories = new AuthService($this->authRepoMock);
    }

    //show error when email is required
    public function testOtpFailWithEmailMissing()
    {
        $result = $this->authRepositories->forget_password(['email' => '']);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals('Email is required', $result['error']);
    }

    //show error when user not found
    public function testChangPasswordWithWrongMailFail()
    {

        $email = 'test@example.com';

        $this->authRepoMock->expects($this->once())
            ->method('getbyemail')
            ->with($email)
            ->willReturn(null);

        $result = $this->authRepositories->forget_password(['email' => $email]);
        $this->assertArrayHasKey('error', $result);
        $this->assertEquals("Mail is not already Register", $result['error']);
    }

    //Show success when email is have in database
    public function testWhenUserWithCorrectMailSuccess()
    {
        $email = 'test@example.com';

        $this->authRepoMock->expects($this->once())
            ->method('getbyemail')
            ->with($email)
            ->willReturn([
                'email' => $email,
            ]);

        $result = $this->authRepositories->forget_password(['email' => $email]);
        $this->assertArrayHasKey('success', $result);
        $this->assertTrue($result['success']);
        $this->assertEquals('test@example.com', $result['email']);
    }
}
