<?php

namespace App\Module\Greeting\Infrastructure\Persistence;


use App\Module\Greeting\Domain\Greeting;
use App\Module\Greeting\Domain\GreetingPersistenceServiceInterface;
use App\Module\Greeting\Domain\Mood;
use App\Module\Greeting\Infrastructure\Persistence\Doctrine\GreetingDoctrineRepository;
use App\Module\Greeting\Infrastructure\Persistence\Doctrine\MoodDoctrineRepository;
use Symfony\Component\Uid\Factory\UuidFactory;

class GreetingService implements GreetingPersistenceServiceInterface
{
    private GreetingDoctrineRepository $repository;
    private UuidFactory $uuidFactory;
    private MoodDoctrineRepository $moodRepository;

    public function __construct(
        GreetingDoctrineRepository $repository,
        UuidFactory $uuidFactory,
        MoodDoctrineRepository $moodRepository
    ) {
        $this->repository = $repository;
        $this->uuidFactory = $uuidFactory;
        $this->moodRepository = $moodRepository;
    }

    public function create(string $message = 'Hello, vonTrotta!', string|null $mood = null): Greeting
    {
        // TODO: Deal with already existing moods.
        if (!is_null($mood)) {
            $mood = new Mood($this->uuidFactory->create(), $mood);
            $this->moodRepository->save($mood);
        }

        $greeting = new Greeting($this->uuidFactory->create(), $message, $mood);
        $this->repository->save($greeting);

        return $greeting;
    }

}
