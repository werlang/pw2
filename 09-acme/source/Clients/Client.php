<?php

namespace Source\Clients;

use Source\Accounts\Checking;
use Source\Accounts\Savings;
use Source\Database\Connect;
use Source\Products\Product;

class Client
{

    private $name;
    private $email;
    private $password;
    private $dtBorn;
    private $address;
    private $saving;
    private $checking;
    private $product;

    /**
     * @param string|null $name
     * @param string|null $email
     * @param string|null $password
     * @param string|null $dtBorn
     * @param Address|null $address
     * O ? no início de cada var, indica que o valor da mesma pode ser NULL
     */
    public function __construct(
        ?string $name = NULL,
        ?string $email= NULL,
        ?string $password = NULL,
        ?string $dtBorn = NULL,
        Address $address = NULL
    )
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->dtBorn = $dtBorn;
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getDtBorn()
    {
        return $this->dtBorn;
    }

    /**
     * @param mixed $dtBorn
     */
    public function setDtBorn($dtBorn): void
    {
        $this->dtBorn = $dtBorn;
    }

    /**
     * @param Address $address
     */
    public function setAddress(Address $address)
    {
        $this->address = $address;
    }

    /**
     * @return Address
     */
    public function getAddress() : Address
    {
        return $this->address;
    }

    /**
     * @param Savings $saving
     */
    public function addSaving(Savings $saving){
        $this->saving[] = $saving;
    }

    /**
     * @return mixed
     */
    public function getSaving()
    {
        return $this->saving;
    }

    /**
     * @param Checking $checking
     */
    public function addChecking(Checking $checking){
        $this->checking[] = $checking;
    }

    /**
     * @param Product $product
     */
    public function addProduct(Product $product)
    {
        $this->product[] = $product;
    }

    /**
     *
     */
    public function insert(): void // por enquanto retorna nada
    {
        /**
         * define a query com parâmetros :name, :email, :password :dtBorn, cada um deles vai ser substituido
         * com a utilização do método ->bindParm
         */
        $query = "INSERT INTO clients VALUES (NULL, :name, :email,:password,:dtBorn,NULL, NULL)";
        /**
         * utilizar o método ->prepare, para criar um objeto PDOStatement, que prepara a query antes
         * de ser utilizada
         */
        $stmt = Connect::getInstance()->prepare($query);
        /**
         * Substituição de cada um dos parâmetros por seus repectivos valores
         */

        var_dump($stmt);

        $stmt->bindParam(":name",$this->name);
        $stmt->bindParam(":email",$this->email);
        $stmt->bindParam(":password",$this->password);
        $stmt->bindParam(":dtBorn",$this->dtBorn);

        $stmt->execute(); // Por fim, a query é executada
        /**
         * mesmo utilizando a $stmt para incluir o registro, quem tem o valor do último registro
         * incluído é a Connect
         */
        var_dump(Connect::getInstance()->lastInsertId());

    }

    /**
     * @param int $id
     */
    public function findById(int $id): void // por enquanto retorna nada
    {
        $query = "SELECT * FROM clients WHERE id = :id"; // da mesma forma se cria a query utilizando parêmetros
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":id", $id ); // substitui o parâmetro pelo respectivo valor, no caso o $id
        $stmt->execute(); // Executa
        $client = $stmt->fetch();
        if($stmt->rowCount() == 1) {
            // Encontrado o registro, os atributos são preenchidos
            var_dump($client);
            $this->name = $client->name;
            $this->email = $client->email;
            $this->password = $client->password;
            $this->dtBorn = $client->dtBorn;
        }
    }
}