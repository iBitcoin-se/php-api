<?php

use \Slim\App;
$app = new App();

// https://yourdomain.com/webhookExampleLink
$app->post('/webhookExampleLink', function(Request $request, Response $response, array $args){
    list($txid,$confirmations,$address, $amount, $currency, $tcn, $webhookSecret) = $request->getParams();

    if ($confirmations === 0){
        // e.g. add transaction to database
    }elseif ($confirmations >= 3){
        // e.g. deliver user item
    }else{
        // transaction pending
    }

    return $response->getBody()->write('{"success":"true"}');
});

