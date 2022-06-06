<?php

/**
 *
 */

/** Chama o arquivo da classe User*/
require __DIR__ . "/../Classes/User.php";

/** instancia o objeto $user a partir da classe User */
$user = new User();
var_dump($user);

$user = new User("Fábio","fabiosantos@ifsul.edu.br");
var_dump($user);

echo "<p>Nome: {$user->getName()} - Email: {$user->getEmail()}</p>";

$user->setName("João");
$user->setEmail("joao@ifsul.edu.br");

echo "<p>Nome: {$user->getName()} - Email: {$user->getEmail()}</p>";

var_dump(get_class_methods($user));