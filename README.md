# Anypay



## معرفی
Anypay یک کتابخانه PHP برای انجام تراکنش‌های پرداخت آنلاین است. این کتابخانه امکان اتصال به درگاه‌های پرداخت مختلف را فراهم می‌کند و از طریق یک API یکپارچه، تجربه‌ای ساده و یکنواخت برای توسعه‌دهندگان فراهم می‌آورد.
## ویژگی‌ها
- پشتیبانی از چندین درگاه پرداخت
- مدیریت خطاها و استثناها
- قابلیت تنظیم پویای تنظیمات پرداخت
- رویدادهای قابل رهگیری برای هر مرحله از پرداخت
## درگاه های فعال در این پکیج
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
## نحوه استفاده
برای استفاده از Anypay، شما باید ابتدا آن را به پروژه PHP خود اضافه کنید. سپس می‌توانید از طریق متدهای API، تراکنش‌های پرداخت خود را مدیریت کنید.

## نحوه نصب
برای نصب Anypay، می‌توانید از Composer استفاده کنید. دستور زیر را در ترمینال خود اجرا کنید:

```bash
composer require morpheusadam/anypay
```

### مثال
در زیر یک نمونه کد برای ایجاد یک تراکنش پرداخت آورده شده است:

### php
```php
$config = ['driver' => 'gatewayName', 'api_key' => 'your_api_key'];
$anypay = new Morpheusadam\Anypay\Anypay($config);
$invoice = new Morpheusadam\Anypay\Invoice();
$invoice->amount(1000); // مبلغ به ریال
$anypay->via('gatewayName')->purchase($invoice)->pay();
```


### استفاده از تابع paywith
```php
$config = ['api_key' => 'your_api_key'];
$gateway = 'gatewayName';
$amount = 1000; // مبلغ به ریال

try {
    $anypay = new Morpheusadam\Anypay\Anypay($config);
    $response = $anypay->payWith($gateway, $amount, $config);
    echo $response->getContent(); // نمایش جزئیات پاسخ
} catch (Exception $e) {
    echo 'خطا در پرداخت: ' . $e->getMessage();
}
```

### verify

```php

 
try {
$anypay = new Morpheusadam\Anypay\Anypay($config);
$receipt = $anypay->verify();
echo 'پرداخت تایید شد. شماره تراکنش: ' . $receipt->getTransactionId();
} catch (Exception $e) {
echo 'خطا در تایید پرداخت: ' . $e->getMessage();
}

```
### اگر میخواهید اطلاعات از طریق فایل کانفیگ فراخوانی شود
```php

$invoice = (new Invoice)->amount(1000);

 Anypay::via('driverName')->purchase(
    $invoice, 
    function($driver, $transactionId) {
 	}
);

```

## پشتیبانی
برای دریافت پشتیبانی بیشتر و رفع اشکالات احتمالی، می‌توانید به بخش Issues در GitHub مراجعه کنید یا با تیم پشتیبانی تماس بگیرید.

## مجوز
این پروژه تحت مجوز MIT منتشر شده است. شما می‌توانید نسخه کامل مجوز را در فایل LICENSE موجود در مخزن کد مشاهده کنید.
## 📞 Contact Me
<div align="center">
    <a href="https://www.linkedin.com/in/hesam-ahmadpour" style="color: red; font-size: 20px; text-decoration: none;">LinkedIn</a> |
    <a href="https://t.me/morpheusadam" style="color: red; font-size: 20px; text-decoration: none;">Telegram</a>
</div>
