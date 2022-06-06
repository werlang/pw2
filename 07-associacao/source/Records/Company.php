<?php

namespace Source\Records;

class Company
{
    private $name;
    /** @var Address */
    private $address;
    /**
     * @param $name
     * @param Address $address
     */
    public function __construct($name, Address $address)
    {
        $this->name = $name;
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
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }
}