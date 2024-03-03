<?php

namespace App\Tests\Integration\Greeting;

use App\Module\Greeting\Application\Greet\GreetRequest;
use App\Module\Greeting\Application\Greet\GreetUseCase;
use App\Module\Greeting\Infrastructure\Persistence\Doctrine\GreetingDoctrineRepository;
use App\Module\Greeting\Infrastructure\Persistence\Doctrine\MoodDoctrineRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;


class GreetUseCaseTest extends KernelTestCase
{
    public function test_we_can_greet_someone(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        $request = new GreetRequest();
        $request->name = "vonTrotta";
        $request->mood = "Nice";

        $useCase = $container->get(GreetUseCase::class);
        $response = $useCase->run($request);

        //Domain Greet service has done its job
        $this->assertEquals("Hello, vonTrotta!", $response->body);

        //Infrastructure Greeting service has created a new greeting record in database
        $numGreetings = $container->get(GreetingDoctrineRepository::class)->count([]);
        $this->assertEquals(1, $numGreetings);

        //Greeting message should be the equal to Response body
        $greetings = $container->get(GreetingDoctrineRepository::class)->findAll();
        $greeting = array_shift($greetings);
        $this->assertEquals($response->body, $greeting->getMessage());

        //Mood has been also persisted
        $numMoods = $container->get(MoodDoctrineRepository::class)->count([]);
        $this->assertEquals(1, $numMoods);

        //Persisted mood label is the one defined in the request
        $moods = $container->get(MoodDoctrineRepository::class)->findAll();
        $mood = array_shift($moods);
        $this->assertEquals($request->mood, $mood->getLabel());
    }
}
