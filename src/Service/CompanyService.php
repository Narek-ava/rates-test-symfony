<?php

namespace App\Service;

use App\Entity\Company;
use Doctrine\ORM\EntityManagerInterface;

class CompanyService
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getAllCompanies(): array
    {
        return $this->entityManager->getRepository(Company::class)->findAll();
    }

}
