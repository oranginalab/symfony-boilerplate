<?php

namespace App\Module\Shared\Infrastructure;

use App\Module\Shared\Domain\UuidGeneratorServiceInterface;
use Symfony\Component\Uid\Factory\UuidFactory;

class UuidGeneratorService implements UuidGeneratorServiceInterface
{
    private UuidFactory $uuidFactory;

    public function __construct(UuidFactory $uuidFactory)
    {
        $this->uuidFactory = $uuidFactory;
    }

    public function generate(): string
    {
        return $this->uuidFactory->create()->toRfc4122();
    }
}
