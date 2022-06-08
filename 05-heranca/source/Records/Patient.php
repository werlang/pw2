<?php

namespace Source\Records;

use Source\General\User;

class Patient extends User
{
    private $chart;
    private $dtBirth;

    public function __construct($name, $email, $chart, $dtBirth)
    {
        parent::__construct($name, $email);
        $this->chart = $chart;
        $this->dtBirth = $dtBirth;
    }

}