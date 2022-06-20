<?php

require __DIR__ . "/source/autoload.php";

$address = new \Source\Clients\Address(
    "Rua A",
    "1212"
);

$client = new \Source\Clients\Client(
    "Fábio Santos",
    "fabiosantos@ifsul.edu.br",
    "1233456",
    "12/02/1976",
    $address
);

$saving01 = new \Source\Accounts\Savings(
    "6456456",
    "1000",
    "05"
);

$saving02 = new \Source\Accounts\Savings(
    "5464654",
    "5000",
    "10"
);

$checking01 = new \Source\Accounts\Checking(
    "64564",
    "60000",
    "1000",
    "10"
);

$checking02 = new \Source\Accounts\Checking(
    "654564",
    "50000",
    "500",
    "10"
);

$product01 = new \Source\Products\Product(
    "Cartão de Crédito",
    "19"
);

$product02 = new \Source\Products\Product(
    "Empréstimo",
    "3"
);

$client->addSaving($saving01);
$client->addSaving($saving02);
$client->addChecking($checking01);
$client->addChecking($checking02);
$client->addProduct($product01);
$client->addProduct($product02);
//var_dump($client);

echo "<p>Nome: {$client->getName()}</p>";
echo "<p>Endereço: {$client->getAddress()->getStreet()}, 
                   {$client->getAddress()->getNumber()}</p>";
echo "<p>Endereço: {$client->getAddress()->show()}</p>";

if($client->getSaving()){
    $arraySanving = $client->getSaving();
    /** @var \Source\Accounts\Savings $saving */
    foreach ($arraySanving as $saving){
        //echo "<p>Nro Conta Poupança: " . $saving->getNumber() . "</p>";
        //echo "<p>Saldo: " . $saving->getBalance() . "</p>";
        echo $saving->show();
    }
}








