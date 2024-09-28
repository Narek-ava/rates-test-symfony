<?php

namespace App\Entity;

use App\Repository\CompanyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompanyRepository::class)]
class Company
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }


    /**
     * @ORM\Column(type="string", length=50)
     */
    #[ORM\Column]

    public  $name;
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * @ORM\Column(type="string", length=10)
     */
    #[ORM\Column]

    public  $code;
    public function getCode(): ?string
    {
        return $this->code;
    }
    /**
     * @ORM\Column(type="float", nullable=true)
     */
    #[ORM\Column]

    public  $rate;
    public function getRate(): ?string
    {
        return $this->rate;
    }
}
