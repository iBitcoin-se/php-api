# iBitcoin API
**PHP implementation**

Interact easily with iBitcoin.se API methods using PHP

## Getting Started

Take a look on iBitcoin documentation page on https://ibitcoin.se/api

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
        
        echo "Your BTC address is: {$wallet['address']}";;
        
        
**Callback File** 

Please take a look on CallbackExample.php file

