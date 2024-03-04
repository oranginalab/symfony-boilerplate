<?php

namespace App\Module\Greeting\Infrastructure\Persistence;


use App\Module\Greeting\Domain\Greeting;
use App\Module\Greeting\Domain\GreetingPersistenceServiceInterface;
use App\Module\Greeting\Domain\Mood;
use App\Module\Greeting\Infrastructure\Persistence\Doctrine\GreetingDoctrineRepository;
use Symfony\Component\Uid\Factory\UuidFactory;

class GreetingService implements GreetingPersistenceServiceInterface
{
    private GreetingDoctrineRepository $repository;
    private UuidFactory $uuidFactory;
    private MoodService $moodService;

    public function __construct(
        GreetingDoctrineRepository $repository,
        UuidFactory $uuidFactory,
        MoodService $moodService
    ) {
        $this->repository = $repository;
        $this->uuidFactory = $uuidFactory;
        $this->moodService = $moodService;
    }

    public function create(string $message = 'Hello, vonTrotta!', ?string $mood = null): Greeting
    {
        $moodObject = (null === $mood) ? null : $this->getMoodObject($mood);

        $greeting = new Greeting($this->uuidFactory->create(), $message, $moodObject);
        $this->repository->save($greeting);

        return $greeting;
    }

    private function getMoodObject(string $moodLabel): Mood
    {
        return $this->moodService->findByLabel($moodLabel) ?: $this->moodService->create($moodLabel);
    }

}
