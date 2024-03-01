<?php

namespace App\Module\Greeting\Infrastructure\Persistence;


use App\Module\Greeting\Domain\Greeting;
use App\Module\Greeting\Domain\GreetingPersistenceServiceInterface;
use App\Module\Greeting\Infrastructure\Persistence\Doctrine\GreetingDoctrineRepository;

class GreetingService implements GreetingPersistenceServiceInterface
{
    private GreetingDoctrineRepository $repository;

    public function __construct(GreetingDoctrineRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(?string $message = 'Hello, VonTrotta!'): void
    {
        $greeting = new Greeting($message);
        $this->repository->save($greeting);
    }

}
