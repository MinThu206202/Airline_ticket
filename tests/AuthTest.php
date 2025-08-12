<?php 

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../app/Services/AuthService.php';
require_once __DIR__ . '/../app/Repositories/AuthRepositories.php';

class AuthTest extends TestCase
{
    private $authRepoMock;
    private $authRepositories;

    public function setUp(): void
    {
        //create fake Repo Mock
        $this->authRepoMock = $this->createMock(AuthRepositories::class);
        //create Reositories to use function
        $this->authRepositories = new AuthService($this->authRepoMock);
    }

    //create error hanlding for required email and password
    public function testLoginFailWithEmailOrPasswordMissing()
    {
        $result = $this->authRepositories->login(['email' => '' , 'password' => '']);
        $this->assertArrayHasKey('error',$result);
        $this->assertEquals('Email and password are required.',$result['error']);

        $result = $this->authRepositories->login(['email' => 'test@example.com']);
        $this->assertArrayHasKey('error',$result);
        $this->assertEquals('Email and password are required.', $result['error']);
    }

    public function testLoginFailWithUserNotFound()
    {
        $email = 'test@example.com';

        $this->authRepoMock->expects($this->once())
                            ->method('getbyemail')
                            ->with($email)
                            ->willReturn(null);
        
        $result = $this->authRepositories->login(['email' => $email, 'password' => 'test']);
        $this->assertArrayHasKey('error',$result);
        $this->assertEquals('User not Found',$result['error']);
    }

    //show error when password is does not watch
    public function testLoginReturnWhenPasswordNotCorrect()
    {
        $email = 'test@exmaple.com';
        $hashed_password = password_hash('wrond_passowr',PASSWORD_DEFAULT);

        $this->authRepoMock->expects($this->once())
                                ->method('getbyemail')
                                ->with($email)
                                ->willReturn([
                                    'id' => '1',
                                    'email' => $email,
                                    'password' => 'test'
                                ]);
        
        $result = $this->authRepositories->login(['email' => $email, 'password' => 'wrond_passowr']);
        $this->assertArrayHasKey('error',$result);
        $this->assertEquals("Invalid password",$result['error']);
    }

    public function testLoginReturnsSuccessWhenCredentialsValid()
    {
        $email = 'user@example.com';
        $plainPassword = 'correct_password';
        $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

        $this->authRepoMock->expects($this->once())
            ->method('getbyemail')
            ->with($email)
            ->willReturn([
                'id' => 1,
                'email' => $email,
                'password' => $hashedPassword,
                'name' => 'User One',
            ]);

        $result = $this->authRepositories->login(['email' => $email, 'password' => $plainPassword]);
        $this->assertArrayHasKey('success', $result);
        $this->assertTrue($result['success']);
        $this->assertEquals($email, $result['email']);
        $this->assertEquals('User One', $result['name']);
        $this->assertEquals(1, $result['id']);
    }

}

?>