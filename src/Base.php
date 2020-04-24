<?php

declare(strict_types=1);

namespace CryptoGateway;


use Exception;

class Base
{

    public static function curl(string $link,?array $post = null){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $link);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
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
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close ($ch);
        if ($error) throw new Exception('CURL Error:'.$error);
        return self::responseHandler($response, $httpCode);
    }
    private static function responseHandler(string $curlRes, int $httpCode){
        $response = json_decode($curlRes,true); // iBitcoin should return response as JSON;
        if (!$response) throw new Exception('invalid response: '.$curlRes); // response is not json
        if (!isset($response['success']) OR $httpCode !== 200) { // iBitcoin returns 200 http code for success responses.
            throw new Exception('iBitcoin Retured Error: '.$curlRes);
        }
        return $response;

    }

}