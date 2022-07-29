<?php

ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);

require __DIR__ . "/source/autoload.php";
require __DIR__ . "/source/Boot/Config.php";

$student = new \Source\School\Student(
    3,
    NULL,
    "pablo@gmail.com"
);

$student->update();

var_dump($student);

