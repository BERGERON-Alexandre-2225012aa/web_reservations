<?php

namespace App\Controller;

use App\Service\ApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    private $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }


    #[Route('/api', name: 'api')]
    public function index(): Response
    {
        $utilisateurs = $this->apiService->getUtilisateurs();

        return $this->render('api/index.html.twig', [
            'utilisateurs' => $utilisateurs,
        ]);
    }
}

