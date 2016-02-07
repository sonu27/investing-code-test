<?php

namespace AR;

class Wallet implements BankAccountInterface
{
    private $balance;
    private $transactions = [];

    public function __construct($initialBalance = 0.0)
    {
        $this->balance = floatval($initialBalance);
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function deposit($amount)
    {
        $this->balance += abs($amount);
    }

    public function withdraw($amount)
    {
        $this->balance -= abs($amount);
    }
}
