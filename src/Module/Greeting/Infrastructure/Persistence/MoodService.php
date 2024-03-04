<?php

namespace App\Module\Greeting\Infrastructure\Persistence;

use App\Module\Greeting\Domain\Mood;
use App\Module\Greeting\Domain\MoodPersistenceServiceInterface;
use App\Module\Greeting\Infrastructure\Persistence\Doctrine\MoodDoctrineRepository;
use Symfony\Component\Uid\Factory\UuidFactory;

class MoodService implements MoodPersistenceServiceInterface
{
    private MoodDoctrineRepository $repository;
    private UuidFactory $uuidFactory;

    public function __construct(MoodDoctrineRepository $repository, UuidFactory $uuidFactory)
    {
        $this->repository = $repository;
        $this->uuidFactory = $uuidFactory;
    }

    public function findByLabel(string $label): ?Mood
    {
        return $this->repository->findOneByLabel($label);
    }

    public function create(string $label): Mood
    {
        $mood = new Mood($this->uuidFactory->create(), $label);
        $this->repository->save($mood);

        return $mood;
    }
}
