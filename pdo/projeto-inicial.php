<?php

use Pdo\Domain\Model\Phone;
use Pdo\Domain\Model\Student;
use Pdo\Infrastructure\Persistence\ConnectionCreator;
use Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();
$repository = new PdoStudentRepository($pdo);



$kelen = new Student(
    null,
    'Kelen',
    new DateTimeImmutable('1983-08-13')
);

$phoneKelen = new Phone(
    null,
    '92',
    '982007344'
);

$kelen->addPhone($phoneKelen);

/** @var Student[] $studentList */
$studentList = $repository->stundentsWithPhones();

var_dump($studentList);
