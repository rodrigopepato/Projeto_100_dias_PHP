<?php

use Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$student = new Student(
    null,
    'Rodrigo Pepato',
    new \DateTimeImmutable('2000-04-06')
);

echo $student->age();
