<?php

use Alura\Mvc\Repository\{VideoRepository, UserRepository};
use Alura\Mvc\Controller\{
    Controller,
    Error404Controller,
    LoginUserController,
    LoginFormController
};

session_start();

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
