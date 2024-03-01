<?php

namespace App\Module\Greeting\Application\Greet;

use App\Module\Greeting\Domain\GreeterService;
use App\Module\Shared\Application\Contract\RequestInterface;
use App\Module\Shared\Application\Contract\ResponseInterface;
use App\Module\Shared\Application\Contract\UseCaseInterface;

class GreetUseCase implements UseCaseInterface
{
    private GreeterService $greeterService;

    public function __construct(GreeterService $greeter)
    {
        $this->greeterService = $greeter;
    }

    public function run(RequestInterface $request): ResponseInterface
    {
        $response = new GreetResponse();
        $response->body = $this->greeterService->greet($request->name);

        return $response;
    }
}
