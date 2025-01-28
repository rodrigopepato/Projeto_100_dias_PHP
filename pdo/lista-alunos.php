<?php

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

$statment = $pdo->query('SELECT * FROM students;');
var_dump($statment->fetchAll());
