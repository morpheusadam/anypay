# Anypay

# Anypay

## Introduction
Anypay is a PHP library for conducting online payment transactions. This library provides the ability to connect to various payment gateways and offers a simple and uniform experience for developers through a unified API.
## Features
- Support for multiple payment gateways
- Error and exception management
- Dynamic payment settings configuration
- Trackable events for each stage of the payment process
## Active Gateways in This Package


```
$gateways = [
    'asanpardakht',
    'aqayepardakht',
    'atipay',
    'azkiVam', // Installment Anypay
    'behpardakht', // mellat
    'bitpay',
    'digipay',
    'etebarino', // Installment Anypay
    'fanavacard',
    'idpay',
    'irankish',
    'local',
    'jibit',
    'nextpay',
    'omidpay',
    'parsian',
    'pasargad',
    'payir',
    'payfa',
    'paypal', // will be added soon in next version
    'payping',
    'paystar',
    'poolam',
    'rayanpay',
    'sadad', // melli
    'saman',
    'sep', // saman electronic Anypay, Keshavarzi & Saderat
    'sepehr', // saderat
    'sepordeh',
    'sizpay',
    'toman',
    'vandar',
    'walleta', // Installment Anypay
    'yekpay',
    'zarinpal',
    'zibal'
];

این درگاه‌ها به شما امکان می‌دهند تا با استفاده از تنظیمات مختلف، پرداخت‌های خود را از طریق درگاه‌های متنوع انجام دهید.

```
## How to Use
To use Anypay, you first need to add it to your PHP project. Then, you can manage your payment transactions via the API methods.

### Example
Below is a sample code for creating a payment transaction:

### php

```php
$config = ['driver' => 'gatewayName', 'api_key' => 'your_api_key'];
$anypay = new Morpheusadam\Anypay\Anypay($config);
$invoice = new Morpheusadam\Anypay\Invoice();
$invoice->amount(1000); // amount in Rials
$anypay->via('gatewayName')->purchase($invoice)->pay();
```


### Using the payWith function

```php
$config = ['api_key' => 'your_api_key'];
$gateway = 'gatewayName';
$amount = 1000; // amount in Rials
try {
$anypay = new Morpheusadam\Anypay\Anypay($config);
$response = $anypay->payWith($gateway, $amount, $config);
echo $response->getContent(); // Display response details
} catch (Exception $e) {
echo 'Error in payment: ' . $e->getMessage();


```

### verify

```php

 
php
try {
$anypay = new Morpheusadam\Anypay\Anypay($config);
$receipt = $anypay->verify();
echo 'Payment confirmed. Transaction number: ' . $receipt->getTransactionId();
} catch (Exception $e) {
echo 'Error in payment confirmation: ' . $e->getMessage();
}

```
### If you want to call information via the config file

```php

$invoice = (new Invoice)->amount(1000);

 Anypay::via('driverName')->purchase(
    $invoice, 
    function($driver, $transactionId) {
 	}
);

```

## Support
For further support and troubleshooting, you can visit the Issues section on GitHub or contact the support team.

## License
This project is published under the MIT license. You can view the full version of the license in the LICENSE file available in the code repository.