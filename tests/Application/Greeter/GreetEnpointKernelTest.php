<?php

namespace App\Tests\Application\Greeter;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GreetEnpointKernelTest extends WebTestCase
{
    public function test_we_can_greet_anyone(): void
    {
        $client = static::createClient();
        $client->jsonRequest('GET', '/greet/vonTrotta');

        $response = json_decode($client->getResponse()->getContent());

        $this->assertResponseIsSuccessful();
        $this->assertEquals('Hello, vonTrotta!', $response->message);
    }
}
