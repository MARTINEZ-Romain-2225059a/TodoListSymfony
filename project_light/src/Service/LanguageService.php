<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class LanguageService
{
    private HttpClientInterface $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getLanguages(): array
    {
        $response = $this->httpClient->request('GET', 'http://127.0.0.1:8001/api/languages');
        $data = $response->toArray();

        // Extraire uniquement la liste des langues sous la clé "member"
        return $data['member'] ?? [];
    }

}
