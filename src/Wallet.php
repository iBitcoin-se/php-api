<?php

declare(strict_types=1);

namespace CryptoGateway;

use Error;
use Exception;

class Wallet
{
    private $currency = null;

    private $methods = ['createAddress', 'addressBalance', 'privateKeyBalance', 'getTransaction', 'addressTransactions', 'walletBalance', 'send', 'sweepPrivateKey', 'push'];
    public function __construct(string $currency)
    {
        $currencies = ['btc', 'bch', 'ltc', 'bsv'];
        if (!in_array($currency, $currencies)) throw new Error('Currency couldn‘t be found');
        $this->currency = $currency;
    }

    public function request(string $method, ?array $params = null){
        if (!in_array($method, $this->methods)) throw new Error('Method was not found');

    }

    public function createAddress(){
        return Base::curl(API_LINK.$this->currency.'/createAddress');
    }
    public function addressBalance(string $address){
        return Base::curl(API_LINK.$this->currency.'/addressBalance' , ['address'=>$address]);
    }
    public function privateKeyBalance(string $wif){
        return Base::curl(API_LINK.$this->currency.'/privateKeyBalance' , ['wif'=>$wif]);
    }
    public function getTransaction(string $txid){
        return Base::curl(API_LINK.$this->currency.'/getTransaction' , ['txid'=>$txid]);
    }
    public function addressTransactions(string $address, int $page){
        return Base::curl(API_LINK.$this->currency.'/addressTransactions' , ['address'=>$address, 'page'=>$page]);
    }
    public function walletBalance(){
        return Base::curl(API_LINK.$this->currency.'/walletBalance');
    }
    public function send(string $amount,string $walletPassword, ?string $address= null, ?string $username = null){
        $data = ['amount'=>$amount,'address'=>$address , 'username'=>$username,'password'=>$walletPassword];
        return Base::curl(API_LINK.$this->currency.'/send',$data);
    }
    public function sweep(string $address,string $wif){
        $data = ['address'=>$address , 'wif'=>$wif];
        return Base::curl(API_LINK.$this->currency.'/sweepPrivateKey',$data);
    }
    public function push(string $hex){
        $data = ['hex'=>$hex];
        return Base::curl(API_LINK.$this->currency.'/push',$data);
    }
}