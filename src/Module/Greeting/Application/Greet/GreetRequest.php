<?php

namespace App\Module\Greeting\Application\Greet;

use App\Module\Shared\Application\Contract\RequestInterface;

class GreetRequest implements RequestInterface
{
    public string $name;
    public string $mood = 'Cool';
}
