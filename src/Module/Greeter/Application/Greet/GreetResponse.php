<?php

namespace App\Module\Greeter\Application\Greet;

use App\Module\Shared\Application\Contract\ResponseInterface;

class GreetResponse implements ResponseInterface
{
    public string $body;
}

