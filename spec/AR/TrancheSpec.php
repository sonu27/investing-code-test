<?php

namespace spec\AR;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TrancheSpec extends ObjectBehavior
{
    function it_is_initializable($id, $monthlyInterestRate, $maxInvestment)
    {
        $this->beConstructedWith($id, $monthlyInterestRate, $maxInvestment);
        $this->shouldHaveType('AR\Tranche');
    }
}
