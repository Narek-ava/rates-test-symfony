<?php

namespace App\Entity;

use App\Enum\CurrencyEnum;
use App\Repository\CurrencyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CurrencyRepository::class)]
class Currency
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    public CurrencyEnum $currencyEnum;

    public function getId(): ?int
    {
        return $this->id;
    }

    #[ORM\Column]

    public $name ;
    public function getName(): ?string
    {
        return $this->name;
    }
    #[ORM\Column]

    public $symbol ;
    public function getSymbol(): ?string
    {
        return $this->symbol;
    }
    #[ORM\Column]

    public $exchange_rate;
    public function getExchangeRate(): ?string
    {
        return $this->exchange_rate;
    }

    // Setters
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setSymbol(string $symbol): self
    {
        $this->symbol = $symbol;
        return $this;
    }

    public function setExchangeRate(float $exchangeRate): self
    {
        $this->exchange_rate = $exchangeRate;
        return $this;
    }
}
