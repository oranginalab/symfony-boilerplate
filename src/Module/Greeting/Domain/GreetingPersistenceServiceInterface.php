<?php

namespace App\Module\Greeting\Domain;

interface GreetingPersistenceServiceInterface
{
    public function create(string $message, ?string $mood): Greeting;
}
