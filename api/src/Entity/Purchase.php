<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PurchaseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PurchaseRepository::class)]
#[ApiResource]
class Purchase
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $purchaseDate = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?book $book = null;

    #[ORM\ManyToOne(inversedBy: 'purchases')]
    private ?Customer $customer = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPurchaseDate(): ?\DateTimeInterface
    {
        return $this->purchaseDate;
    }

    public function setPurchaseDate(?\DateTimeInterface $purchaseDate): self
    {
        $this->purchaseDate = $purchaseDate;

        return $this;
    }

    public function getBook(): ?book
    {
        return $this->book;
    }

    public function setBook(book $book): self
    {
        $this->book = $book;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }
}
