<?php

namespace AR;

class Tranche
{
    private $id;
    private $monthlyInterestRate;
    private $maxInvestment;
    private $balance = 0.0;
    private $investments = [];

    public function __construct($id, $monthlyInterestRate, $maxInvestment)
    {
        $this->id                  = $id;
        $this->monthlyInterestRate = $monthlyInterestRate;
        $this->maxInvestment       = $maxInvestment;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getMonthlyInterestRate()
    {
        return $this->monthlyInterestRate;
    }

    public function getMaxInvestment()
    {
        return $this->maxInvestment;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function getInvestments()
    {
        return $this->investments;
    }

    public function deposit($amount, Investor $investor, \DateTimeImmutable $date)
    {
        $this->balance += abs($amount);
        $this->investments[$investor->getId()][] = new Investment($investor, abs($amount), $date);
    }

    public function investmentAvailableAmount()
    {
        return $this->maxInvestment - $this->balance;
    }

    public function getInvestmentsByInvestorBetween(Investor $investor, \DateTimeImmutable $startDate, \DateTimeImmutable $endDate)
    {
        $investments = [];
        if (isset($this->investments[$investor->getId()])) {
            foreach ($this->investments[$investor->getId()] as $investment) {
                if ($investment->getDate() >= $startDate && $investment->getDate() <= $endDate) {
                    $investments[] = $investment;
                }
            }
        }

        return $investments;
    }

    public function amountEarned(Investor $investor, \DateTimeImmutable $startDate, \DateTimeImmutable $endDate)
    {
        $daysWithinRange   = $startDate->diff($endDate)->d + 1;
        $dailyInterestRate = $this->getMonthlyInterestRate() / $daysWithinRange;
        $amountEarned      = 0.0;

        $investments = $this->getInvestmentsByInvestorBetween($investor, $startDate, $endDate);
        foreach ($investments as $investment) {
            $daysOfInterestEarned = $investment->getDate()->diff($endDate)->d + 1;
            $amountEarned += $daysOfInterestEarned * ($investment->getAmount() * $dailyInterestRate);
        }

        return $amountEarned;
    }
}
