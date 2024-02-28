<?php

namespace App\Entry_point\Http\Controller;

use App\Module\Greeter\Application\Greet\GreetRequest;
use App\Module\Greeter\Application\Greet\GreetUseCase;
use App\Module\Greeter\Domain\GreeterService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class GreeterController extends AbstractController
{

    #[Route('/', name: 'home')]
    #[Route('/greet/{name}', name: 'app_greeter')]
    public function index(GreetUseCase $useCase, Request $httpRequest): JsonResponse
    {
        $request = new GreetRequest();
        $request->name = $httpRequest->get('name', 'VonTrotta');

        $response = $useCase->run($request);

        return $this->json([
            'message' => $response->body,
            'path' => 'src/Controller/GreeterController.php',
        ]);
    }
}
