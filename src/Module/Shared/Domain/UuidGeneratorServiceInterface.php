<?php

namespace App\Module\Shared\Domain;

interface UuidGeneratorServiceInterface
{
    public function generate(): string;
}
