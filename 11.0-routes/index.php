<?php

// show php errors
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);

// composer autoload
require __DIR__ . "/../vendor/autoload.php";
// autoload from project
require __DIR__ . "/Source/autoload.php";

use CoffeeCode\Router\Router;

// raiz do projeto
$router = new Router("http://localhost/~aula/fabio-pw2/11.0-routes");

$router->namespace("Source\Controller");
$router->get("/test", "Test:home");

$router->dispatch();