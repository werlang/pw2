<?php

namespace Source\Employees;

class Employee
{
    private $name;
    private $workhours;
    private $valuehours;
    protected $salary;

    /**
     * @param $name
     * @param $workhours
     * @param $valuehours
     */
    public function __construct($name, $workhours, $valuehours)
    {
        $this->name = $name;
        $this->workhours = $workhours;
        $this->valuehours = $valuehours;
    }

    public function salaryCalc() : void
    {
        $this->salary = $this->workhours * $this->valuehours;
    }
}