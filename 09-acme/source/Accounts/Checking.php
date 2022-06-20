<?php

namespace Source\Accounts;

class Checking extends Account
{
    private $limit;
    private $rate;

    public function __construct($number, $balance, $limit, $rate)
    {
        parent::__construct($number, $balance);
        $this->limit = $limit;
        $this->rate = $rate;
    }

}