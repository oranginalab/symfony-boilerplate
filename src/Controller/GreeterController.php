<?php

namespace App\Controller;

use App\Greeter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class GreeterController extends AbstractController
{

    #[Route('/', name: 'home')]
    #[Route('/greeter/{name}', name: 'app_greeter')]
    public function index($name = 'VonTrotta'): JsonResponse
    {
        $greeter = new Greeter();
        $message = $greeter->greet($name);

        return $this->json([
            'message' => $message,
            'path' => 'src/Controller/GreeterController.php',
        ]);
    }
}
