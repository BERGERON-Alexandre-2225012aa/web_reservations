<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiService
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getUtilisateurs()
    {
        $response = $this->client->request('GET', 'http://127.0.0.1:8001/api/utilisateurs');

        // Vérifie si la requête a réussi
        if ($response->getStatusCode() === 200) {
            return $response->toArray();
        }

        return [];
    }

    // Autres méthodes pour interagir avec l'API (POST, PUT, DELETE)
}
