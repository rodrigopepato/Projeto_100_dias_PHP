<?php

namespace Alura\Mvc\Controller;

class LoginUserController implements Controller
{
    public function processaRequisicao(): void
    {
        require_once __DIR__ . '/../../views/login-form.php';
    }
}
