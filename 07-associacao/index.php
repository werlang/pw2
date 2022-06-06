<?php

require __DIR__ . "/source/autoload.php";

$address = new \Source\Records\Address(
    "General Balbão",
    "324",
    ""
);

$company = new \Source\Records\Company(
    "IFSul - Câmpus Charqueadas",
    $address
);

var_dump($company);

// alternativa

$companyABC = new \Source\Records\Company(
    "ABC - Advogados Associados",
    new \Source\Records\Address("Borges de Medeiros","1000","Conjunto 504")
);

var_dump($companyABC);

echo "<p>Empresa: {$companyABC->getName()}</p> 
      <p>Endereço: {$companyABC->getAddress()->getStreet()}, {$companyABC->getAddress()->getNumber()} </p>
      <p>Complemento: {$companyABC->getAddress()->getComplement()}</p>";

echo "<p>Empresa: {$companyABC->getName()}</p>
      <p>Endereço: {$companyABC->getAddress()->show()}</p>";