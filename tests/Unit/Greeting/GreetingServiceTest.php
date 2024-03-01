<?php

namespace App\Tests\Unit\Greeting;

use App\Module\Greeting\Infrastructure\Persistence\Doctrine\GreetingDoctrineRepository;
use App\Module\Greeting\Infrastructure\Persistence\GreetingService;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Uid\Factory\UuidFactory;
use Symfony\Component\Uid\Uuid;

class GreetingServiceTest extends TestCase
{
    public function test_we_can_create_a_greeting(): void
    {
        $message = 'Hello, VonTrotta!';

        $repositoryMock = $this->createMock(GreetingDoctrineRepository::class);
        $repositoryMock->expects($this->once())->method('save');

        $uuidFactoryMock = $this->createMock(UuidFactory::class);
        $uuidFactoryMock->expects($this->once())->method('create')->willReturn(Uuid::v4());

        $service = new GreetingService($repositoryMock, $uuidFactoryMock);
        $service->create($message);
    }

    public function test_we_can_create_a_greeting_with_a_default_message(): void
    {
        $repositoryMock = $this->createMock(GreetingDoctrineRepository::class);
        $repositoryMock->expects($this->once())->method('save');

        $uuidFactoryMock = $this->createMock(UuidFactory::class);
        $uuidFactoryMock->expects($this->once())->method('create')->willReturn(Uuid::v4());

        $service = new GreetingService($repositoryMock, $uuidFactoryMock);
        $service->create();
    }

}
