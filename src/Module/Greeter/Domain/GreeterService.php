<?php

namespace App\Module\Greeter\Domain;

class GreeterService
{
    /**
     * @param string $name
     * @return string
     */
    public function greet(string $name = "World"): string
    {
        return "Hello, $name!";
    }

}
