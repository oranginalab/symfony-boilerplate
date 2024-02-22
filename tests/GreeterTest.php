<?php declare(strict_types=1);

namespace App\Tests;

require __DIR__.'/../vendor/autoload.php';

use App\Greeter;
use PHPUnit\Framework\TestCase;

final class GreeterTest extends TestCase
{
    public function test_we_can_greet_the_world_in_an_hexagonal_manner(): void
    {
        $greeter = new Greeter();

        $greeting = $greeter->greet('VonTrotta');

        $this->assertSame('Hello, VonTrotta!', $greeting);
    }
}
