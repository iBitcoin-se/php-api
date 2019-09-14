<?php

declare(strict_types=1);

namespace CryptoGateway;


class Base
{

    public static function curl(string $link,?array $post = null){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $link);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CAINFO, dirname(__DIR__).'/cacert.pem');
        if (!is_null($post)){
            $post = array_merge($post ,['api_key'=>API_KEY] );
        }else{
            $post = ['api_key'=>API_KEY];
        }
        $post = http_build_query($post);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        // download cacert.pem using this command: curl --remote-name --time-cond cacert.pem https://curl.haxx.se/ca/cacert.pem
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close ($ch);
        if ($error) throw new \Exception('CURL Error:'.$error);
        return self::responseHandler($response);
    }
    private static function responseHandler(string $curlRes){
        $response = json_decode($curlRes,true); // iBitcoin should return response as JSON;
        if (!$response) throw new \Exception('iBitcoin returned '.$curlRes.' instead of JSON');
        if (!isset($response['success'])) {
            die (json_encode($response));
        }
        return $response;

    }

}