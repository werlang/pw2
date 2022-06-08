<?php

namespace Source\Hospital;

use Source\General\User;

class Doctor extends User
{
    private $register;
    private $specialty;

    public function __construct($name, $email, $register, $specialty)
    {
        parent::__construct($name, $email);
        $this->register = $register;
        $this->specialty = $specialty;
    }

}