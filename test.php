<?php

declare(strict_types=1);
require_once __DIR__ . '/src/globals.php';

use CryptoGateway\Wallet;

define('CALLBACK_SECRET', ''); // iBitcoin.se Callback Secret KEY
define('API_KEY', ''); // iBitcoin.se API KEY

$wallet = new Wallet();
$wallet->setCurrency('btc');

var_dump($wallet->walletBalance());
var_dump($wallet->createAddress());

