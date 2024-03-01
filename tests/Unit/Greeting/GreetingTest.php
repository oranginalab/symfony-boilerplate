<?php

namespace App\Tests\Unit\Greeting;

use App\Module\Greeting\Domain\Greeting;

use DateTime;
use PHPUnit\Framework\TestCase;

class GreetingTest extends TestCase
{
    public function test_we_can_create_a_greeting(): void
    {
        $greeting = new Greeting('Hi,W!');
        $this->assertInstanceOf(Greeting::class, $greeting);
    }

    public function test_we_can_set_id(): void
    {
        $greeting = new Greeting('Hi,W!');
        $greeting->setId(1);

        $this->assertEquals(1, $greeting->getId());
    }

    public function test_createdAt_is_set_at_creation_time(): void
    {
        $greeting = new Greeting('Hi,W!');

        $this->assertNotEmpty($greeting->getCreatedAt());
        $this->assertInstanceof(DateTime::class, $greeting->getCreatedAt());
    }

    public function test_greeting_id_is_a_uuid(): void
    {
        $this->markTestSkipped();
        /*
        $greeting = new Greeting('Hi, W!');

        $this->assertNotEmpty($greeting->getId());
        $this->assertInstanceOf(Uuid::class, $greeting->getId());
        */
    }


}
