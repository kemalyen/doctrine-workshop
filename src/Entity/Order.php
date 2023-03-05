<?php

declare(strict_types=1);

namespace Rhino\Order\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;


/** @ODM\Document(db="apibackend", collection="orders") */
class Order
{
    /** @ODM\Id(strategy="NONE", type="string") */
    private $id;

    /** @ODM\Field(type="float") */
    private float $amount;

    /** @ODM\Field(type="string", name="order_number")  */
    private string $orderNumber;

    /** @ODM\Field(type="date", name="created_at")  */
    private \DateTime $createdAt;

    /**
     * @ODM\ReferenceMany(targetDocument=OrderLine::class, mappedBy="order", cascade={"persist", "remove"})
     */
    private Collection $order_lines;

    public function __construct()
    {
         $this->order_lines = new ArrayCollection(); 
    }


    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): Order
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return string
     */
    public function getOrderNumber(): string
    {
        return $this->orderNumber . 'AA';
    }

    /**
     * @param string $orderNumber
     */
    public function setOrderNumber(string $orderNumber): Order
    {
        $this->orderNumber = $orderNumber;

        return $this;
    }


    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): Order
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection<OrderLine>
     */
    public function getOrderLines(): Collection
    {
        return $this->order_lines;
    }

    public function addOrderLine(OrderLine $order_line): Order
    {
        $order_line->setOrder($this);

        $this->order_lines->add($order_line);

        return $this;
    }
}
