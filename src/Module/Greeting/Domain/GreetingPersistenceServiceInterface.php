<?php

namespace App\Module\Greeting\Domain;

interface GreetingPersistenceServiceInterface
{
    public function create(string $message, string|null $mood): Greeting;
}
