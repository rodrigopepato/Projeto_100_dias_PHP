<?php

namespace Alura\Mvc\Entity;

use InvalidArgumentException;

class Video
{

    private int $id;
    private ?string $filePath = null;

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

    public function filePath(): ?string
    {
        return $this->filePath;
    }

    public function setFilePath(?string $filePath): void
    {
        $this->filePath = $filePath;
    }
}
