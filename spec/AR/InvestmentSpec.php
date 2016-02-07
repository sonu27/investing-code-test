<?php

namespace spec\AR;

use AR\Investor;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InvestmentSpec extends ObjectBehavior
{
    function it_is_initializable(Investor $investor)
    {
        $this->beConstructedWith($investor, 10, new \DateTimeImmutable());
        $this->shouldHaveType('AR\Investment');
    }
}
