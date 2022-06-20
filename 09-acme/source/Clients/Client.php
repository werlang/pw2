<?php

namespace Source\Clients;

use Source\Accounts\Checking;
use Source\Accounts\Savings;
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
     * @param $name
     * @param $email
     * @param $password
     * @param $dtBorn
     */
    public function __construct($name, $email, $password, $dtBorn,Address $address)
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

    public function setAddress(Address $address)
    {
        $this->address = $address;
    }

    public function getAddress() : Address
    {
        return $this->address;
    }

    public function addSaving(Savings $saving){
        $this->saving[] = $saving;
    }

    public function getSaving()
    {
        return $this->saving;
    }

    public function addChecking(Checking $checking){
        $this->checking[] = $checking;
    }

    public function addProduct(Product $product)
    {
        $this->product[] = $product;
    }
}