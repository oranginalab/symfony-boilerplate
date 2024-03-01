<?php

namespace App\Tests\Integration\Greeting;

use App\Module\Greeting\Application\Greet\GreetRequest;
use App\Module\Greeting\Application\Greet\GreetUseCase;
use App\Module\Greeting\Infrastructure\Persistence\Doctrine\GreetingDoctrineRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;


class GreetUseCaseTest extends KernelTestCase
{
    public function test_we_can_greet_someone(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        $request = new GreetRequest();
        $request->name = "vonTrotta";

        $useCase = $container->get(GreetUseCase::class);
        $response = $useCase->run($request);

        //Domain Greet service has done its job
        $this->assertEquals("Hello, vonTrotta!", $response->body);

        //Infrastructre Greeting service has created a new greeting record in database
        $numGreetings = $container->get(GreetingDoctrineRepository::class)->count([]);
        $this->assertEquals(1, $numGreetings);
    }
}
