<?php

namespace spec\AR;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LoanSpec extends ObjectBehavior
{
    function it_is_initializable(\DateTimeImmutable $startDate, \DateTimeImmutable $endDate)
    {
        $this->beConstructedWith($startDate, $endDate, []);
        $this->shouldHaveType('AR\Loan');
    }

    function it_should_return_start_date(\DateTimeImmutable $startDate, \DateTimeImmutable $endDate)
    {
        $this->beConstructedWith($startDate, $endDate, []);
        $this->getStartDate()->shouldReturn($startDate);
    }

    function it_should_return_end_date(\DateTimeImmutable $startDate, \DateTimeImmutable $endDate)
    {
        $this->beConstructedWith($startDate, $endDate, []);
        $this->getEndDate()->shouldReturn($endDate);
    }
}
