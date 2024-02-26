<?php

namespace App\Tests\Integration\Greeter;

use App\Module\Greeter\Application\Greet\GreetRequest;
use App\Module\Greeter\Application\Greet\GreetUseCase;
use App\Module\Greeter\Domain\GreeterService;
use PHPUnit\Framework\TestCase;


class GreetUseCaseTest extends TestCase
{
    public function test_we_can_greet_someone(): void
    {
        $request = new GreetRequest();
        $request->name = "vonTrotta";

        $useCase = new GreetUseCase(new GreeterService());

        $response = $useCase->run($request);

        $this->assertEquals("Hello, vonTrotta!", $response->body);
    }
}
