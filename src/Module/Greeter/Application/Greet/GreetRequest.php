<?php

namespace App\Module\Greeter\Application\Greet;

use App\Module\Shared\Application\Contract\RequestInterface;

class GreetRequest implements RequestInterface
{
    public string $name;
}
