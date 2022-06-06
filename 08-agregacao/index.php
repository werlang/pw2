<?php

require __DIR__ . "/source/autoload.php";

$address = new \Source\Records\Address(
    "Felipe Camarão",
    "12323",
    "Sala 402"
);

$serv01 = new \Source\Records\Services("Inventário","10000");
$serv02 = new \Source\Records\Services("Separação","5000");

var_dump($address, $serv01, $serv02);
// Associação
$company = new \Source\Records\Company(
    "ABC - Advogados Associados",
    $address
);

// Agregação
$company->addService($serv01);
$company->addService($serv02);
//ou de forma aternativa
$company->addService(new \Source\Records\Services(
    "Contratros de Compra e Venda",
    "500"
));

var_dump($company);

/**
 * @var \Source\Records\Services $service
 */
foreach ($company->getServices() as $service){
    echo "<p>{$service->getName()} - Valor {$service->getPrice()}</p>";
}