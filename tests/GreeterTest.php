<?php declare(strict_types=1);


require __DIR__.'/../vendor/autoload.php';

use App\Greeter;
use PHPUnit\Framework\TestCase;

final class GreeterTest extends TestCase
{
    public function testGreetsWithName(): void
    {
        $greeter = new Greeter();

        $greeting = $greeter->greet('VonTrotta');

        $this->assertSame('Hello, VonTrotta!', $greeting);
    }
}
