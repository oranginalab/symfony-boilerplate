<?php

namespace App\Module\Greeter\Domain;

class GreeterService
{
    /**
     * @param string $name
     * @return string
     */
    public function greet(string $name): string
    {
        return "Hello, $name!";
    }

}
