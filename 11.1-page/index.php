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
$router = new Router("http://localhost/~aula/fabio-pw2/11.1-page");


// controller routes
$router->namespace("Source\Controller");

$router->get("/", "Web:home");
$router->get("/sobre", "Web:about");
$router->get("/perfil", "Web:profile");

// api routes
$router->get("/users", "Api:getAll");
$router->get("/users/{id}", "Api:get");

// error pages
$router->get("/error/404", "Error:e404");


$router->dispatch();

// Redirect all errors
if ($router->error()) {
    $router->redirect("/error/{$router->error()}");
}