<?php

namespace App\Module\Shared\Application\Contract;

interface UseCaseInterface
{
    public function run(RequestInterface $request): ResponseInterface;

}
