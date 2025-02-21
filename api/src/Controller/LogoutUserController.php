<?php

namespace Alura\Mvc\Controller;

class LogoutUserController implements Controller
{
    public function processaRequisicao(): void
    {
        $_SESSION['logado'] = false;
        unset($_SESSION['logado']);
        header('Location: /login');
    }
}
