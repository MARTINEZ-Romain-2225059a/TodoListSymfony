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

        return $data['member'] ?? [];
    }

    public function getCodeById(int $id): string
    {
        $languages = $this->getLanguages();

        foreach ($languages as $language) {
            if ($language['id'] === $id) {
                return strtolower($language['name']); // Convertit "FR" → "fr", "EN" → "en"
            }
        }

        return 'fr'; // Par défaut en français si l'ID est inconnu
    }
}
