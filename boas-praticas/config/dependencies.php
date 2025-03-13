<?php

use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;

$builder = new ContainerBuilder();
$builder->addDefinitions([
    PDO::class => function (): PDO {
        $dbPath = __DIR__ . '/../banco.sqlite';
        return new PDO("sqlite:{$dbPath}");
    },
]);

/** @var ContainerInterface $container */
$container = $builder->build();

return $container;
