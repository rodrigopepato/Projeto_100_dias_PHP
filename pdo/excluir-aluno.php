<?php

use Pdo\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();

$preparedStatement = $pdo->prepare('DELETE FROM students WHERE id =?;');
$preparedStatement->bindValue(1, 1, PDO::PARAM_INT);

var_dump($statement->execute());
