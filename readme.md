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

Now you have to update /src/golobals.php file with your iBitcoin.se API keys.

    define('CALLBACK_SECRET', 'e788bc3618432adds765cc637d35aeb65bde'); // iBitcoin.se Callback Secret KEY
    define('API_KEY', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...'); // iBitcoin.se API KEY

Now you are ready to go!
