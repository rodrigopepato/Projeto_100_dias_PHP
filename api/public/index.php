<?php

use Alura\Mvc\Repository\{VideoRepository, UserRepository};
use Alura\Mvc\Controller\{
    Controller,
    Error404Controller,
    LoginUserController,
    LoginFormController
};

session_start();

if (!isset($_SESSION['last_regeneration'])) {
    $_SESSION['last_regeneration'] = time();
} elseif (time() - $_SESSION['last_regeneration'] > 600) {
    session_regenerate_id(true);
    $_SESSION['last_regeneration'] = time();
}

require_once __DIR__ . '/../vendor/autoload.php';

$dbPath = __DIR__ . '/../banco.sqlite';
$pdo = new PDO("sqlite:{$dbPath}");

$videoRepository = new VideoRepository($pdo);
$userRepository = new UserRepository($pdo);

$routes = require_once __DIR__ . '/../config/routes.php';

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

    if (in_array($controllerClass, [LoginUserController::class, LoginFormController::class])) {
        $controller = new $controllerClass($userRepository);
    } else {
        $controller = new $controllerClass($videoRepository);
    }
} else {
    $controller = new Error404Controller;
}

/** @var Controller $controller */
$controller->processaRequisicao();
