<?php

namespace Source\Clients;

class Address
{
    private $street;
    private $number;

    /**
     * @param $street
     * @param $number
     */
    public function __construct($street, $number)
    {
        $this->street = $street;
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param mixed $street
     */
    public function setStreet($street): void
    {
        $this->street = $street;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number): void
    {
        $this->number = $number;
    }

    public function show() : string
    {
        return "{$this->street}, {$this->getNumber()}";
    }

}