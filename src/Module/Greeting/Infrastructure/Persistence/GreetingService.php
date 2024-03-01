<?php

namespace App\Module\Greeting\Infrastructure\Persistence;


use App\Module\Greeting\Domain\Greeting;
use App\Module\Greeting\Domain\GreetingPersistenceServiceInterface;
use App\Module\Greeting\Infrastructure\Persistence\Doctrine\GreetingDoctrineRepository;
use Symfony\Component\Uid\Factory\UuidFactory;

class GreetingService implements GreetingPersistenceServiceInterface
{
    private GreetingDoctrineRepository $repository;
    private UuidFactory $uuidFactory;

    public function __construct(GreetingDoctrineRepository $repository, UuidFactory $uuidFactory)
    {
        $this->repository = $repository;
        $this->uuidFactory = $uuidFactory;
    }

    public function create(?string $message = 'Hello, VonTrotta!'): Greeting
    {
        $greeting = new Greeting($this->uuidFactory->create(), $message);
        $this->repository->save($greeting);

        return $greeting;
    }

}
