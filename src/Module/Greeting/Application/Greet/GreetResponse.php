<?php

namespace App\Module\Greeting\Application\Greet;

use App\Module\Shared\Application\Contract\ResponseInterface;

class GreetResponse implements ResponseInterface
{
    public string $body;
}

