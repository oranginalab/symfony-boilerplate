<?php

namespace App\Entry_point\Http\Controller;

use App\Module\Greeting\Application\Greet\GreetUseCase;
use App\Module\Greeting\Application\Greet\GreetRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class GreetingController extends AbstractController
{

    #[Route('/', name: 'home')]
    #[Route('/greet/{name}', name: 'app_greeter')]
    #[Route('/greet/{name}/{mood}', name: 'app_greeter')]
    public function index(GreetUseCase $useCase, Request $httpRequest): JsonResponse
    {
        $request = new GreetRequest();
        $request->name = $httpRequest->get('name', 'VonTrotta');
        $request->mood = $httpRequest->get('mood', 'Rude');

        $response = $useCase->run($request);

        return $this->json([
            'message' => $response->body,
            'path' => 'src/Controller/GreetingController.php',
        ]);
    }
}
