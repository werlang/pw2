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

    /**
     * @return mixed
     */
    public function getRegister()
    {
        return $this->register;
    }

    /**
     * @param mixed $register
     */
    public function setRegister($register): void
    {
        $this->register = $register;
    }

    /**
     * @return mixed
     */
    public function getSpecialty()
    {
        return $this->specialty;
    }

    /**
     * @param mixed $specialty
     */
    public function setSpecialty($specialty): void
    {
        $this->specialty = $specialty;
    }



}