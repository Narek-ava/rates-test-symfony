<?php


// src/Enum/CurrencyEnum.php
namespace App\Enum;

enum CurrencyEnum: string
{
    case USD_EUR = 'USDEUR=X';
    case EUR_USD = 'EURUSD=X';

    public function getSymbol(): string
    {
        return match ($this) {
            self::USD_EUR => '€',
            self::EUR_USD => '$',
        };
    }
    public function getFlag(): string
    {
        return match ($this) {
            self::USD_EUR => '🇪🇺',
            self::EUR_USD => '🇺🇸',
        };
    }

    public function getName(): string
    {
        return match ($this) {
            self::USD_EUR => 'USD/EUR',
            self::EUR_USD => 'EUR/USD',
        };
    }

    public static function toArray(): array
    {
        return array_map(fn($enum) => $enum->value, self::cases());
    }

    public function getSymbols(): array
    {
        return array_map(fn($enum) => $enum->getSymbol(), self::cases());
    }

    public static function getFlags(): array
    {
        return array_map(fn($enum) => $enum->getFlag(), self::cases());
    }
}
