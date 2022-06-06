<?php

require __DIR__ . "/source/Students/Presential/Student.php";
require __DIR__ . "/source/Students/Apnp/Student.php";

$studentPresential = new \Source\Students\Presential\Student();
$studentApnp = new \Source\Students\Apnp\Student();

var_dump($studentPresential, $studentApnp);
