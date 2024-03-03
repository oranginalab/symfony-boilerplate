<?php

namespace App\Tests\Unit\Greeting;

use App\Module\Greeting\Infrastructure\Persistence\Doctrine\MoodDoctrineRepository;
use App\Module\Greeting\Infrastructure\Persistence\MoodService;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Uid\Factory\UuidFactory;
use Symfony\Component\Uid\Uuid;

class MoodServiceTest extends TestCase
{
    public function test_we_can_create_a_new_mood(): void
    {
        $label = 'Rude';

        $repositoryMock = $this->createMock(MoodDoctrineRepository::class);
        $repositoryMock->expects($this->once())->method('save');

        $uuidFactoryMock = $this->createMock(UuidFactory::class);
        $uuidFactoryMock->expects($this->once())->method('create')->willReturn(Uuid::v4());

        $service = new MoodService($repositoryMock, $uuidFactoryMock);
        $service->create($label);
    }


}
