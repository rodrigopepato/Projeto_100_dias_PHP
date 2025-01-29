<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Models\Products;

$products = Products::all();

$filteredProducts = array_filter($products, static fn(array $product) => $product['is_available']);

$title = 'My WebStore';

require __DIR__ . '/../resources/views/index.phtml';
