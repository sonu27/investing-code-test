<?php
namespace AR;

use AR\Service\InvestingService;

require_once 'vendor/autoload.php';

date_default_timezone_set('UTC');

$tranches = [
    'A' => new Tranche('A', 0.03, 1000),
    'B' => new Tranche('B', 0.06, 1000),
];

$loan = new Loan(new \DateTimeImmutable('2015-10-01'), new \DateTimeImmutable('2015-11-15'), $tranches);

$investors = [
    new Investor('1', new Wallet(1000)),
    new Investor('2', new Wallet(1000)),
    new Investor('3', new Wallet(1000)),
    new Investor('4', new Wallet(1000)),
];

$investingService = new InvestingService();

try {
    $investingService->invest($loan->getTranche('A'), $investors[0], 1000, new \DateTimeImmutable('2015-10-03'));
} catch (\Exception $e) {
    var_dump($e->getMessage());
}

try {
    $investingService->invest($loan->getTranche('A'), $investors[1], 1, new \DateTimeImmutable('2015-10-04'));
} catch (\Exception $e) {
    var_dump($e->getMessage());
}

try {
    $investingService->invest($loan->getTranche('B'), $investors[2], 500, new \DateTimeImmutable('2015-10-10'));
} catch (\Exception $e) {
    var_dump($e->getMessage());
}

try {
    $investingService->invest($loan->getTranche('B'), $investors[3], 1100, new \DateTimeImmutable('2015-10-25'));
} catch (\Exception $e) {
    var_dump($e->getMessage());
}

foreach ($investors as $investor) {
    $amountEarned = $loan->amountEarned($investor, new \DateTimeImmutable('2015-10-01'), new \DateTimeImmutable('2015-10-31'));
    echo 'Investor '.$investor->getId().' earned '.$amountEarned.PHP_EOL;
}
