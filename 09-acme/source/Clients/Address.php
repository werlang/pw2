<?php

namespace Source\Clients;

/**
 *
 */
class Address
{
    /**
     * @var string|null
     */
    private string $street;
    /**
     * @var string|null
     */
    private string $number;

    /**
     * @param string|null $street
     * @param string|null $number
     */
    public function __construct(
        string $street = NULL, 
        string $number = NULL
    )
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

    /**
     * @return string
     */
    public function show() : string
    {
        return "{$this->street}, {$this->getNumber()}";
    }

    public function insert()
    {
        
    }

    public function findByIdClient()
    {
        
    }

}