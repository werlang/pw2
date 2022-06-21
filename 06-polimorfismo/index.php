<?php

require __DIR__ . "/source/autoload.php";

$employee = new \Source\Employees\Employee(
    "José",
    "160",
    "25"
);
$employee->salaryCalc();
var_dump($employe);

$salesman = new \Source\Employees\Saller(
    "João",
    "160",
    "30",
    "5000");

$salesman->salaryCalc();
var_dump($salesman);