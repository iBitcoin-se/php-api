<?php

declare(strict_types=1);
require_once __DIR__ . '/vendor/autoload.php';

use CryptoGateway\Wallet;

define('CALLBACK_SECRET', ''); // iBitcoin.se Callback Secret KEY
define('API_KEY', ''); // iBitcoin.se API KEY
define('API_LINK', 'https://backend.ibitcoin.se/api/');

$wallet = new Wallet('btc');

$addressInfo = $wallet->createAddress();

echo "Your BTC address is: {$wallet['address']}";

$walletBalance = $wallet->walletBalance();

echo "Your wallet balance:". var_export($walletBalance);

