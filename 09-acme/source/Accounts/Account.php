<?php

namespace Source\Accounts;

class Account
{
    protected $number;
    protected $balance;

    /**
     * @param $number
     * @param $balance
     */
    public function __construct($number, $balance)
    {
        $this->number = $number;
        $this->balance = $balance;
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
    public function setNamber($number): void
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param mixed $balance
     */
    public function setBalance($balance): void
    {
        $this->balance = $balance;
    }

}