<?php

namespace Source\Products;

class Product
{
    private $name;
    private $cost;

    /**
     * @param $name
     * @param $cost
     */
    public function __construct($name, $cost)
    {
        $this->name = $name;
        $this->cost = $cost;
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
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param mixed $cost
     */
    public function setCost($cost): void
    {
        $this->cost = $cost;
    }




}