<?php

namespace App\Controller;

use App\Service\ApiService;
use App\Service\CompanyService;
use App\Service\CurrencyService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
class HomeController extends AbstractController
{

    private $apiService;
    private $currencyService;
    private $companyService;

    public function __construct(ApiService $apiService ,CurrencyService $currencyService, CompanyService $companyService)
    {
        $this->currencyService = $currencyService;
        $this->companyService = $companyService;
    }
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $currencies = $this->currencyService->getAllCurrencies();
        $companies = $this->companyService->getAllCompanies();

        return $this->render('home/index.html.twig', [
            'currencies' => $currencies,
            'companies' => $companies,
        ]);
    }

    #[Route('/sync-currency-rates', name: 'sync_currency_rates')]

    public function syncCurrencyRates(Request $request): RedirectResponse
    {
        $this->currencyService->syncCurrencyRates();

        return $this->redirect($request->headers->get('referer'));
    }
}
