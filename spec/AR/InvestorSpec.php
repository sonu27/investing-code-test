<?php

namespace spec\AR;

use AR\Wallet;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InvestorSpec extends ObjectBehavior
{
    function it_is_initializable(Wallet $wallet)
    {
        $this->beConstructedWith('1', $wallet);
        $this->shouldHaveType('AR\Investor');
    }

    function it_should_return_an_id(Wallet $wallet)
    {
        $this->beConstructedWith('1', $wallet);
        $this->getId()->shouldReturn('1');
    }

    function it_should_return_wallet(Wallet $wallet)
    {
        $this->beConstructedWith('1', $wallet);
        $this->getWallet()->shouldReturn($wallet);
    }
}
