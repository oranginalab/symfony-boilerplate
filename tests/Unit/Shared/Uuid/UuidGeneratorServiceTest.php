<?php

namespace App\Tests\Unit\Shared\Uuid;

use App\Module\Shared\Infrastructure\UuidGeneratorService;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Uid\Factory\UuidFactory;


class UuidGeneratorServiceTest extends TestCase
{
    public function test_we_can_generate_uuid_as_string(): void
    {
        $uuid = (new UuidGeneratorService(new UuidFactory()))->generate();

        $this->assertIsString($uuid);
        $this->assertEquals(36, strlen($uuid));
    }
}
