<?php

use Alura\Mvc\Controller\{
    DeleteVideoController,
    EditVideoController,
    NewVideoController,
    VideoFormController,
    VideoListController,
    };

return [
    'GET|/' => VideoListController::class,
    'GET|/novo-video' => VideoFormController::class,
    'POST|/novo-video' => NewVideoController::class,
    'GET|/editar-video' => VideoFormController::class,
    'POST|/editar-video' => EditVideoController::class,
    'GET|/remover-video' => DeleteVideoController::class,
];
