<?php

namespace spec\AR;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WalletSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith(1000);
        $this->shouldHaveType('AR\Wallet');
    }
}
