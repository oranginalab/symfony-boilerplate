<?php

namespace App\Module\Greeting\Application\Greet;

use App\Module\Greeting\Domain\GreeterService;
use App\Module\Greeting\Domain\GreetingPersistenceServiceInterface;
use App\Module\Greeting\Domain\Mood;
use App\Module\Shared\Application\Contract\RequestInterface;
use App\Module\Shared\Application\Contract\ResponseInterface;
use App\Module\Shared\Application\Contract\UseCaseInterface;

class GreetUseCase implements UseCaseInterface
{
    private GreeterService $greeterService;
    private GreetingPersistenceServiceInterface $greetingService;

    public function __construct(GreeterService $greeter, GreetingPersistenceServiceInterface $greeting)
    {
        // Domain service to just greet someone
        $this->greeterService = $greeter;

        // Infrastructure service to create and persist a greeting object
        $this->greetingService = $greeting;
    }

    public function run(RequestInterface $request): ResponseInterface
    {
        $response = new GreetResponse();
        $response->body = $this->greeterService->greet($request->name);

        // Create and persist a greeting object
        $this->greetingService->create($response->body, $request->mood);

        return $response;
    }
}
