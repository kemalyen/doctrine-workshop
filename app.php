#!/usr/bin/env php
<?php

// Adjust this path to your actual bootstrap.php

use Rhino\Order\Entity\Order;
use Rhino\Order\Entity\OrderLine;
use Rhino\Order\Enums\OrderStatus;
require __DIR__ . '/bootstrap.php';

$order = new \Rhino\Order\Entity\Order;

$id = 'oi-'.time();
$order->setId($id);
$order->setOrderNumber('TEST 0000'. rand(100, 100001));
$order->setAmount(5.9);
$order->setCreatedAt(new DateTime());

 for($i = 1; $i < 3; $i++){
    $line = (new OrderLine)
        ->setDescription('TestProduct'. $i)
        ->setSku('HB9888')
        ->setQuantity(1*$i)
        ->setUnitPrice(3.5 * $i);
        $order->addOrderLine($line);
} 


$entityManager->persist($order);
$entityManager->flush();
echo $id . PHP_EOL;