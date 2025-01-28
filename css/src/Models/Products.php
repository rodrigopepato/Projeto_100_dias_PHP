<?php

namespace App\Models;

class Products
{
    public static function all(): array
    {
        return [
            [
                'name'         => 'xbox',
                'price'        => 500,
                'is_available' => true,
            ],
            [
                'name'         => 'PlayStation',
                'price'        => 600,
                'is_available' => true,
            ],
            [
                'name'         => 'Nitendo Switch',
                'price'        => 300,
                'is_available' => false,
            ],
        ];
    }
}
