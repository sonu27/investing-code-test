<?php

namespace spec\AR\Service;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InvestingServiceSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('AR\Service\InvestingService');
    }
}
