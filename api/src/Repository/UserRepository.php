<?php

namespace Alura\Mvc\Repository;

use PDO;
use Alura\Mvc\Entity\User;

class UserRepository
{

    public function __construct(private PDO $pdo)
    {
    }

    public function findByEmail(string $email): ?User
    {
        $sql = 'SELECT * FROM users WHERE email = ?;';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $email);
        $statement->execute();
        $userData = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$userData) {
            return null;
        }

        return $this->hydrateUser($userData);
    }

    public function hydrateUser(array $userData): User
    {

        $user = new User($userData['email'], $userData['password']);

        if (isset($userData['id'])) {
            $user->setId($userData['id']);
        }

        return $user;
    }
}
