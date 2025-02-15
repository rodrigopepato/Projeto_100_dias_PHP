<?php

namespace Alura\Mvc\Entity;

use InvalidArgumentException;

class Video
{
    public readonly string $url;

    public function __construct(
        string $url,
        public readonly string $title
    ) {
        $this->setUrl($url);
    }

    public function setUrl(string $url): void
    {
        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            throw new InvalidArgumentException;
        }

        $this->url = $url;
    }
}
