<?php

namespace AR;

class Investment
{
    private $investor;
    private $amount;
    private $date;

    public function __construct(Investor $investor, $amount, \DateTimeImmutable $date)
    {
        $this->investor = $investor;
        $this->amount   = $amount;
        $this->date     = $date;
    }

    public function getInvestor()
    {
        return $this->investor;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getDate()
    {
        return $this->date;
    }
}
