<?php

namespace Source\Accounts;

class Savings extends Account
{
    private $dtBith;

    public function __construct($number, $balance, $dtBirth)
    {
        parent::__construct($number, $balance);
        $this->dtBith = $dtBirth;
    }

    /**
     * @return mixed
     */
    public function getDtBith()
    {
        return $this->dtBith;
    }

    /**
     * @param mixed $dtBith
     */
    public function setDtBith($dtBith): void
    {
        $this->dtBith = $dtBith;
    }

    public function show(): string
    {
        return "<p>Número da conta poupança: {$this->number}</p>" .
               "<p>Saldo: {$this->balance}</p>" .
               "<p>Dt. Aniversário: {$this->dtBith}</p>";
    }

}