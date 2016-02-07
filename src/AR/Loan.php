<?php

namespace AR;

class Loan
{
    private $startDate;
    private $endDate;
    private $tranches;

    public function __construct(\DateTimeImmutable $startDate, \DateTimeImmutable $endDate, array $tranches)
    {
        $this->startDate = $startDate;
        $this->endDate   = $endDate;
        $this->tranches  = $tranches;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }

    public function getTranche($key)
    {
        if (isset($this->tranches[$key])) {
            return $this->tranches[$key];
        }
    }

    public function amountEarned(Investor $investor, \DateTimeImmutable $startDate, \DateTimeImmutable $endDate)
    {
        $amountEarned = 0.0;

        $investments = [];
        foreach ($this->tranches as $tranche) {
            $amountEarned += $tranche->amountEarned($investor, $startDate, $endDate);
        }

        return round($amountEarned, 2);
    }
}
