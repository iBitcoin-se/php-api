<?php

declare(strict_types=1);
require_once __DIR__ . '/src/globals.php';

use CryptoGateway\Wallet;


$dd = new Wallet();
$dd->setCurrency('btc');

var_dump($dd->walletBalance());
var_dump($dd->privateKeyBalance('L2tg4hiFiktj5u9M8ZkSRJzfuktBPduAFTH347F8FUQuiiBLx6cY'));


