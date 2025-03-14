<?php

use DI\ContainerBuilder;
use League\Plates\Engine;
use Psr\Container\ContainerInterface;

$builder = new ContainerBuilder();
$builder->addDefinitions([
    PDO::class => function (): PDO {
        $dbPath = __DIR__ . '/../banco.sqlite';
        return new PDO("sqlite:{$dbPath}");
    },
    Engine::class => function (): Engine
    {
        $templatePath = __DIR__ . '/../views';
        return new Engine($templatePath);
    }
]);

/** @var ContainerInterface $container */
$container = $builder->build();

return $container;
