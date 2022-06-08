<?php

require __DIR__ . "/source/autoload.php";

$user = new \Source\General\User("Fábio","fabiosantos@ifsul.edu.br");

var_dump($user);

$userDoctor = new \Source\Hospital\Doctor(
    "Dráuzio Varela",
    "druziovarela@gmail.com",
    "12435676",
    "Oncologista");

var_dump($userDoctor);

$userPatient = new \Source\Records\Patient(
    "Fábio Santos",
    "fabiosantos@ifsul.edu.br",
    "Prontuário",
    "12/02/1976");

var_dump($userPatient);