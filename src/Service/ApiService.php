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

    public function fetchCurrencies(): array
    {
        // Replace this with the actual API URL for currency data
        $response = $this->client->request('GET', 'https://api.example.com/currencies');

        if ($response->getStatusCode() !== 200) {
            throw new \Exception('Failed to fetch currency data');
        }

        return $response->toArray();
    }

    public function fetchCompanies(): array
    {
        // Replace this with the actual API URL for company data
        $response = $this->client->request('GET', 'https://api.example.com/companies');

        if ($response->getStatusCode() !== 200) {
            throw new \Exception('Failed to fetch company data');
        }

        return $response->toArray();
    }
}
