<?php

namespace App\Service;

use App\Entity\Currency;
use App\Enum\CurrencyEnum;
use Scheb\YahooFinanceApi\ApiClientFactory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class CurrencyService
{
    private HttpClientInterface $httpClient;
    private EntityManagerInterface $entityManager;

    public function __construct(HttpClientInterface $httpClient, EntityManagerInterface $entityManager)
    {
        $this->httpClient = $httpClient;
        $this->entityManager = $entityManager;
    }

    public function getAllCurrencies(): array
    {
        return $this->entityManager->getRepository(Currency::class)->findAll();
    }
    public function syncCurrencyRates(): void
    {
        $client = ApiClientFactory::createApiClient();

        $symbols = array_map(fn($enum) => $enum->value, CurrencyEnum::cases());

        $quotes = $client->getQuotes($symbols);
        foreach ($quotes as $quote) {
            $currency = $this->entityManager->getRepository(Currency::class)
                ->findOneBy(['symbol' => $quote->getSymbol()]);

            if ($currency) {
                $currency->setExchangeRate($quote->getRegularMarketPrice());
            }
        }

        $this->entityManager->flush();
    }
}
