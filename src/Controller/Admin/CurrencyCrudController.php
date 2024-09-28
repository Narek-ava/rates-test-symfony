<?php

namespace App\Controller\Admin;

use App\Entity\Currency;
use App\Enum\CurrencyEnum;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CurrencyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Currency::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            ChoiceField::new('name')
                ->setChoices(array_combine(
                    array_map(fn($enum) => $enum->getName(), CurrencyEnum::cases()),
                    array_map(fn($enum) => $enum->getName(), CurrencyEnum::cases())
                )),
        ChoiceField::new('symbol')
                ->setChoices(array_combine(
                    array_map(fn($enum) => $enum->value, CurrencyEnum::cases()),
                    array_map(fn($enum) => $enum->value, CurrencyEnum::cases())
                ))
                ->setLabel('Symbol'),
        TextField::new('exchange_rate')

        ];
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $entityManager->persist($entityInstance);
        $entityManager->flush();
    }
}
