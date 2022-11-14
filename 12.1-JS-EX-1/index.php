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
$router = new Router("http://localhost");


// controller routes
$router->namespace("Source\Controller");

$router->get("/", "Web:home");

// api routes
$router->get("/products", "Api:getAll");
$router->get("/products/{id}", "Api:get");
$router->post("/products", "Api:insert");
$router->put("/products/{id}", "Api:update");

// error pages
$router->get("/error/404", "Error:e404");


$router->dispatch();

// Redirect all errors
if ($router->error()) {
    $router->redirect("/error/{$router->error()}");
}