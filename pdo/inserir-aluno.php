<?php

use Pdo\Domain\Model\Student;
use Pdo\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();

$student = new Student(
    null,
    'Pauli Bentes',
    new \DateTimeImmutable('1999-08-09')
    );

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES ( :name, :birth_date );";
$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(':name', $student->name());
$statement->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));

if ($statement->execute()) {
    echo 'Aluno registrado com sucesso';
}
