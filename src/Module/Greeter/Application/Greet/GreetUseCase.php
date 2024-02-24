<?php

namespace App\Module\Greeter\Application\Greet;

use App\Module\Greeter\Domain\GreeterService;
use App\Module\Shared\Application\Contract\RequestInterface;
use App\Module\Shared\Application\Contract\ResponseInterface;
use App\Module\Shared\Application\Contract\UseCaseInterface;

class GreetUseCase implements UseCaseInterface
{
    private GreeterService $greeter;

    public function __construct(GreeterService $greeter)
    {
        $this->greeter = $greeter;
    }

    public function run(RequestInterface $request): ResponseInterface
    {
        $response = new GreetResponse();
        $response->body = $this->greeter->greet($request->name);

        return $response;
    }
}
