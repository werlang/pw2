<?php
require __DIR__ . "/source/autoload.php";

$studentPresential = new \Source\Students\Presential\Student();
$studentApnp = new \Source\Students\Apnp\Student();

var_dump($studentPresential, $studentApnp);