<?php

use Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

$student = new Student(null, 'Rodrigo Pepato', new \DateTimeImmutable('2000-04-06'));

$sqlInsert = "INSERT INTO students (name, bith_date) VALUES ('{$student->name()}', '{$student->birthDate()->format('Y-m-d')}');";

var_dump($pdo->exec($sqlInsert));
