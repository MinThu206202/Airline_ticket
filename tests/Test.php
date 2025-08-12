<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../app/config/config.php';

// Then load base classes and dependencies
require_once __DIR__ . '/../app/libraries/Controller.php';
require_once __DIR__ . '/../app/libraries/Database.php';
require_once __DIR__ . '/../app/controllers/Auth.php';
require_once __DIR__ . '/../app/Services/AuthService.php';


class Test extends TestCase
{
    public function testGetemailReturnsExpectedResult()
    {
        $mockRepo = $this->createMock(AuthInterface::class);

        $testEmail = 'test@eample.com';

        $expectedResult = [
            'id' => 123,
            'email' => $testEmail,
            'name' => 'Test User'
        ];

        // Expect getbyemail called once with $testEmail and return $expectedResult
        $mockRepo->expects($this->once())
            ->method('getbyemail')
            ->with($this->equalTo($testEmail))
            ->willReturn($expectedResult);

        $service = new AuthService($mockRepo);

        $result = $service->login(['email' => $testEmail]);

        $this->assertEquals($expectedResult, $result);
    }
}
