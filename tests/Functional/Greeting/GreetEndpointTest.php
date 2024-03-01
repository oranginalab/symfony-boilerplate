<?php

namespace App\Tests\Application\Greeting;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class GreetEndpointTest extends TestCase
{

    public function test_we_can_greet_you(): void
    {
        $client = HttpClient::create();
        try {
            $baseUri = 'http://webserver:80';
            $response = $client->request('GET', $baseUri . '/greet/vonTrotta');
            $response_obj = json_decode($response->getContent());
        } catch (ClientExceptionInterface|RedirectionExceptionInterface|ServerExceptionInterface|TransportExceptionInterface $e) {
            $this->fail($e->getMessage());
        }

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('Hello, vonTrotta!', $response_obj->message);
    }
}
