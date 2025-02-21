<?php

namespace Alura\Mvc\Entity;

class User
{

    private ?int $id = null;

    public function __construct(
        private readonly string $email,
        private readonly string $password
    )
    {
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

}
