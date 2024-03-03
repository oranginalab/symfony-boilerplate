<?php

namespace App\Module\Greeting\Domain;

interface MoodPersistenceServiceInterface
{
    public function create(string $label): Mood;
}
