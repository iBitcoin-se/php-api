# iBitcoin API
**PHP implementation**

Interact easily with iBitcoin.se API methods using PHP

## Getting Started

You'll find much detailed information on our API documentation page [iBitcoin.se](https://ibitcoin.se/api)
Issuses and PRs are welcome

### Prerequisites

Please make sure PHP with CURL and JSON extenations is installed and enabled

### Installing

First install the package from Composer

      php compser.phar require ibitcoin/php-api

Now in your application you need to define your iBitcoin.se API keys as follows:

    define('CALLBACK_SECRET', 'e788bc3618432adds765cc637d35aeb65bde'); // iBitcoin.se Callback Secret KEY
    define('API_KEY', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...'); // iBitcoin.se API KEY
    define('API_LINK', 'https://backend.ibitcoin.se/api/');

### Examples

**Create Address**

        declare(strict_types=1);
        require_once __DIR__ . '/vendor/autoload.php';
        
        use CryptoGateway\Wallet;
        
        define('CALLBACK_SECRET', ''); // iBitcoin.se Callback Secret KEY
        define('API_KEY', ''); // iBitcoin.se API KEY
        define('API_LINK', 'https://backend.ibitcoin.se/api/');
        
        $wallet = new Wallet();
        $wallet->setCurrency('btc');
        
        $addressInfo = $wallet->createAddress();
        
        echo "Your BTC address is: {$wallet['address']}";
        
        
        
        
**Callback File** 

Please take a look on CallbackExample.php file


### Postman Examples

#### CreateAddress

```
https://backend.ibitcoin.se/api/btc/createAddress?api_key=[API_KEY_FROM_SETTINGS]
```

Response

    {
        "address": "bc1qfuqvvv5racupgk60xfjwkm5ku8j6zk7aj2as4p",
        "success": true,
        "time": 1586070585
    }

#### AddressTransactions

```
https://backend.ibitcoin.se/api/btc/addressTransactions?api_key=[API_KEY_FROM_SETTINGS]&address=3JuAyD5z6sdgZp998GjV775RexfniF3nA9&page=1
```

Response

    {
        "address": "3JuAyD5z6sdgZp998GjV775RexfniF3nA9",
        "transactions": [
            {
                "currency": "btc",
                "address": "3JuAyD5z6sdgZp998GjV775RexfniF3nA9",
                "confirmations": 11,
                "category": "send",
                "txid": "28c49e3f7decf13b15f0813605ab85377dbad7b3d8978e1450e26f636afe21df",
                "amount": "0.00148368",
                "time": 1586013517,
                "tcn": "111-228"
            }
        ],
        "total": 1,
        "currency": "btc",
        "note": "This method doesn't work with addresses created outside iBitcoin.se",
        "success": true,
        "time": 1586069717
    }