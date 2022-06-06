<?php

require __DIR__ . "/source/autoload.php";

$employe = new \Source\Employees\Employee(
    "José",
    "160",
    "25"
);
$employe->salaryCalc();
var_dump($employe);

$saller = new \Source\Employees\Saller(
    "João",
    "160",
    "30",
    "5000");

$saller->salaryCalc();
var_dump( $saller);