<?php

namespace App\Tests\Unit\Greeting;

use App\Module\Greeting\Domain\Greeting;

use App\Module\Greeting\Domain\Mood;
use DateTime;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Uid\Factory\UuidFactory;

class GreetingTest extends TestCase
{
    private string $id;
    private string $message;

    public function setUp(): void
    {
        parent::setUp();

        $this->id = (new UuidFactory())->create()->toRfc4122();
        $this->message = 'Hi, W!';
    }

    public function test_we_can_create_a_greeting(): void
    {
        $greeting = new Greeting($this->id, $this->message);
        $this->assertInstanceOf(Greeting::class, $greeting);
    }

    public function test_createdAt_is_set_at_creation_time(): void
    {
        $greeting = new Greeting($this->id, $this->message);

        $this->assertNotEmpty($greeting->getCreatedAt());
        $this->assertInstanceof(DateTime::class, $greeting->getCreatedAt());
    }

    public function test_greeting_id_is_a_valid_uuid(): void
    {
        $greeting = new Greeting($this->id, $this->message);


        $this->assertNotEmpty($greeting->getId());
        $this->assertIsString($greeting->getId());
        $this->assertEquals(36, strlen($greeting->getId()));
    }

    public function test_we_can_set_a_greeting_mood(): void
    {
        $mood = new Mood((new UuidFactory())->create()->toRfc4122(), 'Gentle');
        $greeting = new Greeting($this->id, $this->message);
        $greeting->setMood($mood);

        $this->assertEquals('Gentle', $greeting->getMood()->getLabel());
    }

    public function tearDown(): void
    {
        parent::tearDown();
        unset($this->id);
        unset($this->message);
    }

}
