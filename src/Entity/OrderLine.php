<?php

declare(strict_types = 1);

namespace Rhino\Order\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/** @ODM\Document(db="apibackend", collection="order_lines") */
class OrderLine
{
    /** @ODM\Id */
    private $id;

    //#[Column(name: 'order_id')]
     /** @ODM\Field(name="order_id")  */
    private int $orderId;

    /** @ODM\Field(type="string", name="description")  */
    private string $description;

    /** @ODM\Field(type="string", name="sku")  */
    private $sku;

    /** @ODM\Field(type="int") */
    private int $quantity;

    //#[ODM\Field(name: 'unit_price', type: Types::DECIMAL, precision: 10, scale: 2)]
    /** @ODM\Field(type="float", name="unit_price") */
    private float $unitPrice;

    /**
     * @ODM\ReferenceOne(targetDocument=Order::class, inversedBy="order")
     */
    private Order $order;

    public function getId(): int
    {
        return $this->id;
    }

    public function getOrderId(): int
    {
        return $this->orderId;
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function setSku(string $sku): OrderLine
    {
        $this->sku = $sku;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): OrderLine
    {
        $this->description = $description;

        return $this;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): OrderLine
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getUnitPrice(): float
    {
        return $this->unitPrice;
    }

    public function setUnitPrice(float $unitPrice): OrderLine
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function setOrder(Order $order): OrderLine
    {
        $this->order = $order;

        return $this;
    }
}