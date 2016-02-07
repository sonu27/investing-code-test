<?php

namespace AR;

interface BankAccountInterface
{
    public function getBalance();

    public function deposit($amount);

    public function withdraw($amount);
}
