<?php

namespace App;

class Greeter
{
    public function greet(string $name = 'World'): string
    {
        return 'Hello, '. $name. '!';
    }
}
