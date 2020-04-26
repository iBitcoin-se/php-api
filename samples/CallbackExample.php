<?php

/*
 * simple example for callback file
 * this file is called by iBitcoin when you receive a payment.
 * You have to set the url of this file in your iBitcoin account
 */

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';


if ($_POST['webhookSecret'] ?? false !== CALLBACK_SECRET)  {
    http_response_code(400);
    die('BAD REQUEST');
} // request wasn't made by iBitcoin

/*
 * You have to change the following code, it's just a simple example
 *
 *
 */
if ($_POST['confirmations'] ?? false === 0){     // For example you can add the transaction to the database once you received it.

    // these are the params iBitcoin will send.
    list($txid,$confirmations,$address, $amount, $currency, $tcn, $webhookSecret) = $_POST;

}

if ($_POST['confirmations'] ?? false > 0 AND $_POST['confirmations'] < 3 ){ // transaction is pending and not yet confirmed.
    // update confirmations in your database
}
if ($_POST['confirmations'] ?? false >= 3){
    // transaction is confrimed, tell your user order is completed.
    // for this transaction by doing the following.
    // Note: iBitcoin will stop sending callbacks after 10 confirmations
}
http_response_code(200);