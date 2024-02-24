<?php

namespace App\Module\Greeter\Application\Greet;

use App\Module\Greeter\Domain\GreeterService;

class GreetUseCase
{
    private GreeterService $greeter;

    public function __construct(GreeterService $greeter)
    {
        $this->greeter = $greeter;
    }

    public function run(GreetRequest $request): GreetResponse
    {
        $response = new GreetResponse();
        $response->body = $this->greeter->greet($request->name);

        return $response;
    }
}
