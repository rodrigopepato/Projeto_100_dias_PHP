<?php

namespace Pdo\Domain\Model;

class Phone
{
    public function __construct(
        private ?int $id,
        private string $areaCode,
        private string $number
    ) {}

    public function formattedPhone(): string
    {
        return "($this->areaCode) $this->number";
    }
}
