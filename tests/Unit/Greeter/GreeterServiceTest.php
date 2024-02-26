<?php

namespace App\Tests\Unit\Greeter;

use App\Module\Greeter\Domain\GreeterService;

use PHPUnit\Framework\TestCase;

class GreeterServiceTest extends TestCase
{
    public function test_we_can_greet_anyone(): void
    {
        $greeter = new GreeterService();
        $greeting = $greeter->greet("Anyone");

        $this->assertEquals("Hello, Anyone!", $greeting);
    }

    public function test_we_greet_the_whole_world_as_a_default(): void
    {
        $greeter = new GreeterService();
        $greeting = $greeter->greet();

        $this->assertEquals("Hello, World!", $greeting);
    }
}
