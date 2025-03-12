<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Helper\FlashMessageTrait;
use Alura\Mvc\Repository\UserRepository;
use Nyholm\Psr7\Response;
use PDO;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class LoginUserController implements Controller
{
    use FlashMessageTrait;

    public function __construct(private UserRepository $userRepository)
    {
    }

    public function processaRequisicao(ServerRequestInterface $request): ResponseInterface
    {
        $getParsedBody = $request->getParsedBody();
        $email = filter_var($getParsedBody['email'], FILTER_VALIDATE_EMAIL);
        $password = filter_var($getParsedBody['password']);

        if (!$email || !$password) {
            $this->addErrorMessage('Usuário ou senha inválidos');
            return new Response(302, [
                'Location' => '/login'
            ]);
        }

        $user = $this->userRepository->findByEmail($email);

        if (!$user) {
            $this->addErrorMessage('Usuário ou senha inválidos');
            return new Response(302, [
                'Location' => '/login'
            ]);
        }

        if (password_verify($password, $user->password())) {
            if (password_needs_rehash($user->password(), PASSWORD_ARGON2ID)) {
                $this->userRepository->updatePassword($user->id(), $password);
            }

            $_SESSION['logado'] = true;
            return new Response(302, [
                'Location' => '/'
            ]);
        } else {
            $this->addErrorMessage('Usuário ou senha inválidos');
            return new Response(302, [
                'Location' => '/'
            ]);
        }
    }
}
