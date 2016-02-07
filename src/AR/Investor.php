<?php

namespace AR;

class Investor
{
    private $id;
    private $wallet;

    public function __construct($id, Wallet $wallet)
    {
        $this->id     = $id;
        $this->wallet = $wallet;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getWallet()
    {
        return $this->wallet;
    }
}
