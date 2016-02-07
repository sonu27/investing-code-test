<?php

namespace AR\Service;

use AR\Investor;
use AR\Tranche;

class InvestingService
{
    public function invest(Tranche $tranche, Investor $investor, $amount, \DateTimeImmutable $date = null)
    {
        $wallet = $investor->getWallet();
        if ($amount > $tranche->investmentAvailableAmount()) {
            throw new \DomainException('Cannot go over the tranche maximum investment amount.');
        }

        if ($amount > $wallet->getBalance()) {
            throw new \DomainException('The wallet does not have sufficient funds to complete the investment');
        }

        if ($date === null) {
            $date = new \DateTimeImmutable();
        }

        $wallet->withdraw($amount);
        $tranche->deposit($amount, $investor, $date);

    }
}
