<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repository\UserRepository;
use PDO;

class LoginUserController implements Controller
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');

        if (!$email || !$password) {
            $_SESSION['error_message'] = 'Usuário ou senha inválidos';
            header('Location: /login');
            exit();
        }

        $user = $this->userRepository->findByEmail($email);

        if (!$user) {
            $_SESSION['error_message'] = 'Usuário ou senha inválidos';
            header('Location: /login');
            exit();
        }

        if (password_verify($password, $user->password())) {
            if (password_needs_rehash($user->password(), PASSWORD_ARGON2ID)) {
                $this->userRepository->updatePassword($user->id(), $password);
            }

            $_SESSION['logado'] = true;
            header('Location: /');
        } else {
            $_SESSION['error_message'] = 'Usuário ou senha inválidos';
            header('Location: /login');
            exit();
        }
    }
}
