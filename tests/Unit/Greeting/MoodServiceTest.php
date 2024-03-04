<?php

namespace App\Tests\Unit\Greeting;

use App\Module\Greeting\Domain\Mood;
use App\Module\Greeting\Infrastructure\Persistence\Doctrine\MoodDoctrineRepository;
use App\Module\Greeting\Infrastructure\Persistence\MoodService;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Uid\Factory\UuidFactory;
use Symfony\Component\Uid\Uuid;

class MoodServiceTest extends TestCase
{
    private MoodDoctrineRepository $repositoryMock;
    private UuidFactory $uuidFactoryMock;
    private MoodService $service;

    protected function setup(): void
    {
        $this->repositoryMock = $this->createMock(MoodDoctrineRepository::class);
        $this->uuidFactoryMock = $this->createMock(UuidFactory::class);

        $this->service = new MoodService($this->repositoryMock, $this->uuidFactoryMock);
    }

    public function test_we_can_create_a_new_mood(): void
    {
        $label = 'Rude';

        $this->repositoryMock->expects($this->once())->method('save');
        $this->uuidFactoryMock->expects($this->once())->method('create')->willReturn(Uuid::v4());

        $service = new MoodService($this->repositoryMock, $this->uuidFactoryMock);
        $service->create($label);
    }

    public function test_we_can_get_a_mood_by_label(): void
    {
        $label = 'Rude';
        $mood = new Mood(Uuid::v4(), $label);

        $this->repositoryMock->expects($this->once())
            ->method('findOneByLabel')
            ->with($label)
            ->willReturn($mood);


        $this->assertEquals($mood, $this->service->findByLabel($label));
    }


}
