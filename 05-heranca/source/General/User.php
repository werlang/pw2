<?php

namespace Source\General;

class User
{
    private $name;
    private $email;
    /**
     * @param $name
     * @param $email
     */
    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    /** @return mixed */
    public function getName()
    {
        return $this->name;
    }
    /** @param mixed $name */
    public function setName($name)
    {
        $this->name = $name;
    }
    /** @return mixed */
    public function getEmail()
    {
        return $this->email;
    }
    /** @param mixed $email */
    public function setEmail($email)
    {
        $this->email = $email;
    }
}