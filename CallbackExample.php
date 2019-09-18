<?php

/*
 * simple example for callback file
 * this file is called by iBitcoin when you receive a payment.
 * You have to set this file URL on your iBitcoin account
 */

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

function json_reponse(string $status,?string $message){
    die( json_encode(['status'=>$status,'message'=>$message]));
}

if ($_POST['webhookSecret'] ?? false !== CALLBACK_SECRET)  json_reponse('error','Bad Request'); // request wasn't made by iBitcoin

/*
 * You have to change the following code, it's just a simple example
 *
 *
 */
if ($_POST['confirmations'] ?? false === 0){     // For example you can add the transaction to the database if we just received it.

    // these are the params iBitcoin will send.
    $avaliableInfo['txid'] = $_POST['txid'];
    $avaliableInfo['amount'] = $_POST['amount'];
    $avaliableInfo['confirmations'] = $_POST['confirmations'];
    $avaliableInfo['currency'] = $_POST['currency'];
    $avaliableInfo['address'] = $_POST['address'];
    $avaliableInfo['tcn'] = $_POST['tcn'];

}

if ($_POST['confirmations'] ?? false > 0 AND $_POST['confirmations'] < 3 ){ // transaction is pending and not yet confirmed.
    // update confirmations in your database

}
if ($_POST['confirmations'] ?? false >= 3){
    // transaction is confrimed, tell your user order is complete and tell iBitcoin to stop sending you any more callbacks
    // for this transaction by doing the following.
    // Note: iBitcoin will stop sending callbacks after 10 confirmations even if you didn't return "stop"

    json_reponse('stop', null);

}