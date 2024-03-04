<?php

namespace App\Tests\Unit\Greeting;

use App\Module\Greeting\Domain\Mood;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Uid\Factory\UuidFactory;
use Symfony\Component\Uid\Uuid;

class MoodTest extends TestCase
{
    public function test_we_can_create_a_mood(): void
    {
        $mood = new Mood(Uuid::v4(), 'Happy');
        $this->assertInstanceOf(Mood::class, $mood);
    }

    public function test_getter_and_setters_work_properly(): void
    {
        $mood = new Mood(Uuid::v4(), 'Happy');

        $id = Uuid::v4();
        $label = 'Cool';

        $mood->setId($id);
        $this->assertEquals($id, $mood->getId());

        $mood->setLabel($label);
        $this->assertEquals($label, $mood->getLabel());
    }
}
