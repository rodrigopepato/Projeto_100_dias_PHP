<?php

namespace Pdo\Infrastructure\Persistence;

use PDO;

class ConnectionCreator
{
    public static function createConnection(): PDO
    {

        $connection = new PDO('mysql:host=localhost');
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $connection;
    }
}
