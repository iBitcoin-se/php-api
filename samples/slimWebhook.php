<?php

use \Slim\App;
$app = new App();

// https://yourdomain.com/webhookExampleLink
$app->post('/webhookExampleLink', function(Request $request, Response $response, array $args){

    $txid = $request->getParam('txid');
    $confirmations = $request->getParam('confirmations');
    $address = $request->getParam('address');
    $amount = $request->getParam('amount');
    $currency = $request->getParam('currency');
    $tcn = $request->getParam('tcn');
    $webhookSecret = $request->getParam('webhookSecret');
    $description = $request->getParam('description');

    if ($webhookSecret !== 'YOUR_IBITCOIN_SECRET_FROM_YOUR_ACCOUNT') {
        return $response->getBody()->write(json_encode(['success' => true]));
    }

    if ($confirmations === 0){
        // e.g. add transaction to database
    }elseif ($confirmations >= 3){
        // e.g. deliver user item
    }else{
        // transaction pending
    }

    return $response->getBody()->write(json_encode(['success' => true]));
});

