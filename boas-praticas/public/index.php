<?php

use Alura\Mvc\Repository\{VideoRepository, UserRepository};
use Alura\Mvc\Controller\Error404Controller;
use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;

session_start();

if (!isset($_SESSION['last_regeneration'])) {
    $_SESSION['last_regeneration'] = time();
} elseif (time() - $_SESSION['last_regeneration'] > 600) {
    session_regenerate_id(true);
    $_SESSION['last_regeneration'] = time();
}

require_once __DIR__ . '/../vendor/autoload.php';

$routes = require_once __DIR__ . '/../config/routes.php';
/** @var ContainerInterface $diContainer */
$diContainer = require_once __DIR__ . '/../config/dependencies.php';

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

$isLoginRoute = $pathInfo === '/login';

if (!isset($_SESSION['logado']) && !$isLoginRoute) {
    header('Location: /login');
    exit();
}

if ($isLoginRoute && $_SERVER['REQUEST_METHOD'] === 'POST') {
    session_regenerate_id(true);
}

$key = "$httpMethod|$pathInfo";

if (array_key_exists($key, $routes)) {
    $controllerClass = $routes[$key];

    $controller = $diContainer->get($controllerClass);
} else {
    $controller = new Error404Controller;
}

$psr17Factory = new \Nyholm\Psr7\Factory\Psr17Factory();

$creator = new \Nyholm\Psr7Server\ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);

$request = $creator->fromGlobals();

/** @var RequestHandlerInterface $controller */
$response = $controller->handle($request);

http_response_code($response->getStatusCode());
foreach ($response->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $response->getBody();
