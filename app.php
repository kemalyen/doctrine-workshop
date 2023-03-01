#!/usr/bin/env php
<?php

// Adjust this path to your actual bootstrap.php

use Rhino\Order\Entity\Order;
use Rhino\Order\Entity\OrderLine;
use Rhino\Order\Enums\OrderStatus;
require __DIR__ . '/bootstrap.php';

$order = new \Rhino\Order\Entity\Order;

$order->setOrderNumber('TEST00001');
$order->setAmount(5.9);
$order->setStatus(OrderStatus::Paid);
$order->setCreatedAt(new DateTime());

for($i = 1; $i < 5; $i++){
    $line = (new OrderLine)
        ->setDescription('Test Product '. $i)
        ->setQuantity(1*$i)
        ->setUnitPrice(3.5 * $i);
        $order->addOrderLine($line);
}


$entityManager->persist($order);
$entityManager->flush();
