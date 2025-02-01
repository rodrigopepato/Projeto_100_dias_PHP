<?php

use Pdo\Domain\Model\Student;
use Pdo\Infrastructure\Persistence\ConnectionCreator;
use Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();
$studentRepository = new PdoStudentRepository($connection);

$connection->beginTransaction();

try {
    $aStudent = new Student(
        null,
        'Danielle',
        new DateTimeImmutable('1980-04-06')
        );
    $studentRepository->save($aStudent);

    $anotherStudent = new Student(
        null,
        'Marianny',
        new DateTimeImmutable('1980-07-06')
        );
    $studentRepository->save($anotherStudent);

    $connection->commit();
} catch(PDOException $e) {
    echo $e->getMessage();
    $connection->rollBack();
}
