<?php

declare(strict_types=1);

namespace CryptoGateway;

class Wallet
{
    private static $currency = null;
    public function setCurrency(string $currency) : void{
        $currencies = ['btc', 'bch', 'ltc', 'bsv'];
        if (!in_array($currency, $currencies)) throw new \Exception('Currency couldn‘t be found');
        self::$currency = $currency;
    }

    public function createAddress(){
        if (is_null(self::$currency)) throw new \Exception('Currency isn‘t set');
        $res =  Base::curl(API_LINK.self::$currency.'/createAddress');
        return $res;
    }
    public function addressBalance(string $address){
        if (is_null(self::$currency)) throw new \Exception('Currency isn‘t set');
        $res =  Base::curl(API_LINK.self::$currency.'/addressBalance' , ['address'=>$address]);
        return $res;
    }
    public function privateKeyBalance(string $wif){
        if (is_null(self::$currency)) throw new \Exception('Currency isn‘t set');
        $res =  Base::curl(API_LINK.self::$currency.'/privateKeyBalance' , ['wif'=>$wif]);
        return $res;
    }
    public function getTransaction(string $txid){
        if (is_null(self::$currency)) throw new \Exception('Currency isn‘t set');
        $res =  Base::curl(API_LINK.self::$currency.'/getTransaction' , ['txid'=>$txid]);
        return $res;
    }
    public function walletBalance(){
        $res =  Base::curl(API_LINK.self::$currency.'/walletBalance');
        return $res;
    }
    public function send(string $amount,string $walletPassword, ?string $address= null, ?string $username = null){
        $data = ['amount'=>$amount,'address'=>$address , 'username'=>$username,'password'=>$walletPassword];
        $res =  Base::curl(API_LINK.self::$currency.'/send',$data);
        return $res;
    }
    public function sweep(string $address,string $wif){
        $data = ['address'=>$address , 'wif'=>$wif];
        $res =  Base::curl(API_LINK.self::$currency.'/sweepPrivateKey',$data);
        return $res;
    }
    public function push(string $hex){
        $data = ['hex'=>$hex];
        $res =  Base::curl(API_LINK.self::$currency.'/push',$data);
        return $res;
    }
}