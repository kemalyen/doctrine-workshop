<?php
// bootstrap.php 
require_once "vendor/autoload.php";
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use MongoDB\Client;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
 

 
$client = new Client('mongodb+srv://', [], ['typeMap' => DocumentManager::CLIENT_TYPEMAP]);
$config = new Configuration();

$config->setProxyDir(__DIR__ . '/data/Proxies');
$config->setProxyNamespace('Proxies');
$config->setHydratorDir(__DIR__ . '/data/Hydrators');
$config->setHydratorNamespace('Hydrators');
//$config->setDefaultDB('apibackend');
$config->setMetadataDriverImpl(AnnotationDriver::create(__DIR__ . '/src/Entity'));

$entityManager = DocumentManager::create($client, $config);