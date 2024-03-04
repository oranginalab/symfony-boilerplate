<?php

namespace App\Tests\Unit\Greeting;

use App\Module\Greeting\Domain\Mood;
use App\Module\Greeting\Infrastructure\Persistence\Doctrine\GreetingDoctrineRepository;
use App\Module\Greeting\Infrastructure\Persistence\GreetingService;
use App\Module\Greeting\Infrastructure\Persistence\MoodService;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Uid\Factory\UuidFactory;
use Symfony\Component\Uid\Uuid;


class GreetingServiceTest extends TestCase
{
    private GreetingService $service;
    private GreetingDoctrineRepository $repositoryMock;
    private UuidFactory $uuidFactoryMock;
    private MoodService $moodServiceMock;

    public function setup(): void
    {
        $this->repositoryMock = $this->createMock(GreetingDoctrineRepository::class);
        $this->uuidFactoryMock = $this->createMock(UuidFactory::class);
        $this->moodServiceMock = $this->createMock(MoodService::class);

        $this->service = new GreetingService($this->repositoryMock, $this->uuidFactoryMock, $this->moodServiceMock);
    }

    public function test_we_can_create_a_greeting(): void
    {
        $message = 'Hello, World!';

        // Main entity repository dependency
        $this->repositoryMock->expects($this->once())->method('save');

        // Association entity dependency
        $this->moodServiceMock->expects($this->never())->method('findByLabel');
        $this->moodServiceMock->expects($this->never())->method('create');

        // Uuid generator service dependency
        $this->uuidFactoryMock->expects($this->once())->method('create')->willReturn(Uuid::v4());

        $greeting = $this->service->create($message);
        $this->assertEquals($message, $greeting->getMessage());
        $this->assertNull($greeting->getMood());
    }

    public function test_we_can_create_a_greeting_with_a_default_message(): void
    {
        // Main entity repository dependency
        $this->repositoryMock->expects($this->once())->method('save');

        // Association entity dependency
        $this->moodServiceMock->expects($this->never())->method('findByLabel');
        $this->moodServiceMock->expects($this->never())->method('create');

        $this->uuidFactoryMock->expects($this->once())->method('create')->willReturn(Uuid::v4());

        $greeting = $this->service->create();

        $this->assertEquals('Hello, vonTrotta!', $greeting->getMessage());
        $this->assertNull($greeting->getMood());
    }

    public function test_we_can_create_a_greeting_with_a_mood_object(): void
    {
        // Main entity repository dependency
        $this->repositoryMock->expects($this->once())->method('save');

        // Association entity dependency
        $this->moodServiceMock->expects($this->once())->method('findByLabel')->willReturn(null);
        $this->moodServiceMock->expects($this->once())->method('create')->willReturn(
            new Mood(Uuid::v4(), 'Nice')
        );

        $this->uuidFactoryMock->expects($this->once())->method('create')->willReturn(Uuid::v4());

        $greeting = $this->service->create('Hello in good mood!', 'Nice');

        $this->assertEquals('Hello in good mood!', $greeting->getMessage());
        $this->assertEquals('Nice', $greeting->getMood()->getLabel());
    }

    public function test_we_can_create_a_greeting_with_an_already_existing_mood_object(): void
    {
        // Main entity repository dependency
        $this->repositoryMock->expects($this->once())->method('save');

        // Association entity dependency
        $this->moodServiceMock->expects($this->once())->method('findByLabel')->willReturn(
            new Mood(Uuid::v4(), 'Existing mood')
        );
        $this->moodServiceMock->expects($this->never())->method('create');

        $this->uuidFactoryMock->expects($this->once())->method('create')->willReturn(Uuid::v4());

        $greeting = $this->service->create('Hello in good mood!', 'Existing mood');
        $this->assertEquals('Hello in good mood!', $greeting->getMessage());
        $this->assertEquals('Existing mood', $greeting->getMood()->getLabel());
    }

}
