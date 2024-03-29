<?php

namespace App\Entity;

use App\Repository\OrderDetailRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderDetailRepository::class)]
class OrderDetail
{


    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\Id]              //clé primaire composite   //
    #[ORM\ManyToOne(inversedBy: 'ordersDetails')]     //
    private ?Orders $orders = null;                 //
                                                  //
    #[ORM\Id]           //clé primaire composite //
    #[ORM\ManyToOne(inversedBy: 'orderDetails')]
    private ?Product $product = null;



    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getOrders(): ?Orders
    {
        return $this->orders;
    }

    public function setOrders(?Orders $orders): static
    {
        $this->orders = $orders;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): static
    {
        $this->product = $product;

        return $this;
    }
}
