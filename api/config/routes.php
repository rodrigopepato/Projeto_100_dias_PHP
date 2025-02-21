<?php

use Alura\Mvc\Controller\{
    DeleteVideoController,
    EditVideoController,
    NewVideoController,
    VideoFormController,
    VideoListController,
    LoginFormController,
    LoginUserController,
    LogoutUserController,
};

return [
    'GET|/' => VideoListController::class,
    'GET|/novo-video' => VideoFormController::class,
    'POST|/novo-video' => NewVideoController::class,
    'GET|/editar-video' => VideoFormController::class,
    'POST|/editar-video' => EditVideoController::class,
    'GET|/remover-video' => DeleteVideoController::class,
    'GET|/login' => LoginFormController::class,
    'POST|/login' => LoginUserController::class,
    'GET|/logout' => LogoutUserController::class,
];
