<?php

namespace App;

class Greetings
{
    public function message(string $name): string
    {
        return "Hello {$name}! How are you doing today?";
    }
}
