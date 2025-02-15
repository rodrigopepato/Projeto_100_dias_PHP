<?php

namespace Alura\Mvc\Entity;

use InvalidArgumentException;

class Video
{

    private int $id;

    public function __construct(
        public readonly string $url,
        public readonly string $title
    ) {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new InvalidArgumentException("URL inválida: $url");
        }
    }

    public function id(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
}
