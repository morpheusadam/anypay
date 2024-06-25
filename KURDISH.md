# Anypay


## پێناسه‌
Anypay کتێبخانەیەکی PHPیە بۆ ئەنجامدانی مامەڵەکانی پارەدانی ئۆنلاین. ئەم کتێبخانەیە توانای پەیوەستکردنی بە درگای جیاوازی پارەدانی فەراهەم دەکات و لە رێگەی APIیەکی یەکگرتوو، تەجربەیەکی سادە و یەکسان بۆ پەرەپێدەران دابین دەکات.
## تایبەتمەندیەکان
- پشتیوانی لە چەندین درگای پارەدان
- بەڕێوەبردنی هەڵەکان و نایاساییەکان
- توانای ڕێکخستنی دیاریکراوی پارەدان بە شێوەی داینامیک
- ڕووداوەکان دەتوانرێن بۆ هەر قۆناغێکی پارەدان بەدوادا بچرێن
## درگاه‌های چالاک لەم بستەدا
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

ئەم درگاه‌ها بە تۆ دەتوانن بە بەکارهێنانی ڕێکخستنە جیاوازەکان، پارەدانەکانت بەرێوە ببەن.

```bash
composer require morpheusadam/anypay
```

```
## چۆنیەتی بەکارهێنان
بۆ بەکارهێنانی Anypay، پێویستە سەرەتا ئەمە بە پڕۆژەی PHP خۆت زیاد بکەیت. پاشان دەتوانی لە رێگەی مەتۆدەکانی API، مامەڵەکانی پارەدانەکەت بەڕێوە ببەیت.

### نموونە
لە خوارەوە نموونەیەکی کۆد بۆ دروستکردنی مامەڵەیەکی پارەدان هاتووە:

### php
```php
$config = ['driver' => 'gatewayName', 'api_key' => 'your_api_key'];
$anypay = new Morpheusadam\Anypay\Anypay($config);
$invoice = new Morpheusadam\Anypay\Invoice();
$invoice->amount(1000); // بڕی پارە بە ریال
$anypay->via('gatewayName')->purchase($invoice)->pay();
```


### بەکارهێنانی فەنکشنی paywith
```php
$config = ['api_key' => 'your_api_key'];
$gateway = 'gatewayName';
$amount = 1000; // بڕی پارە بە ریال

try {
    $anypay = new Morpheusadam\Anypay\Anypay($config);
    $response = $anypay->payWith($gateway, $amount, $config);
    echo $response->getContent(); // پیشاندانی وردەکارییەکانی وەڵام
} catch (Exception $e) {
    echo 'هەڵە لە پارەدان: ' . $e->getMessage();
}
```

### پشتڕاستکردنەوە

```php

try {
$anypay = new Morpheusadam\Anypay\Anypay($config);
$receipt = $anypay->verify();
echo 'پارەدان پشتڕاست کرایەوە. ژمارەی مامەڵە: ' . $receipt->getTransactionId();
} catch (Exception $e) {
echo 'هەڵە لە پشتڕاستکردنەوەی پارەدان: ' . $e->getMessage();
}
echo 'پارەدان پشتڕاست کرایەوە. ژمارەی مامەڵە

```
### ئەگەر دەتەوێت زانیاریەکان لە رێگەی فایلی کۆنفیگەوە بانگهێشت بکرێن

```php

$invoice = (new Invoice)->amount(1000);

 Anypay::via('driverName')->purchase(
    $invoice, 
    function($driver, $transactionId) {
 	}
);

```

## پشتیوانی
بۆ وەرگرتنی پشتیوانی زیاتر و چارەسەرکردنی کێشەکانی دەرکەوتوو، دەتوانیت سەردانی بەشی Issues لە GitHub بکەیت یان پەیوەندی بە تیمی پشتیوانی بکەیت.


## مجوز
ئەم پڕۆژەیە بە مۆڵەتی MIT بڵاوکراوەتەوە. دەتوانیت وەشانی تەواوی مۆڵەتەکە لە فایلی LICENSE دا ببینیت کە لە خەزنی کۆددا هەیە.
