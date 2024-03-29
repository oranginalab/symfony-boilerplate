<?php

namespace App\Tests\Functional\Greeting;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GreetEndpointKernelTest extends WebTestCase
{
    public function test_we_can_greet_anyone(): void
    {
        $client = static::createClient();
        $client->jsonRequest('GET', '/greet/vonTrotta');

        $response = json_decode($client->getResponse()->getContent());

        $this->assertResponseIsSuccessful();
        $this->assertEquals('Hello, vonTrotta!', $response->message);
    }

    public function test_we_can_greet_anyone_with_a_singular_mood(): void
    {
        $client = static::createClient();
        $client->jsonRequest('GET', '/greet/vonTrotta/nice');

        $response = json_decode($client->getResponse()->getContent());

        $this->assertResponseIsSuccessful();
        $this->assertEquals('Hello, vonTrotta!', $response->message);
    }
}
