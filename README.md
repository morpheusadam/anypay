<div align="center">

# 💳 Anypay — Multi-Gateway PHP / Laravel Payment Library

### A comprehensive PHP & Laravel payment library that connects 40+ payment gateways behind one unified API — purchase, pay, and verify online transactions with a single, consistent interface.

<p>
  <img src="https://img.shields.io/github/license/morpheusadam/anypay?style=for-the-badge&color=4c1" alt="License" />
  <img src="https://img.shields.io/github/stars/morpheusadam/anypay?style=for-the-badge&color=ffca28" alt="Stars" />
  <img src="https://img.shields.io/github/forks/morpheusadam/anypay?style=for-the-badge&color=42a5f5" alt="Forks" />
  <img src="https://img.shields.io/github/last-commit/morpheusadam/anypay?style=for-the-badge&color=8e44ad" alt="Last commit" />
  <img src="https://img.shields.io/github/repo-size/morpheusadam/anypay?style=for-the-badge&color=e67e22" alt="Repo size" />
</p>

<p>
  <img src="https://img.shields.io/badge/PHP-7.2%2B-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP" />
  <img src="https://img.shields.io/badge/Laravel-Package-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel" />
  <img src="https://img.shields.io/badge/Composer-Install-885630?style=for-the-badge&logo=composer&logoColor=white" alt="Composer" />
  <img src="https://img.shields.io/badge/Gateways-40%2B-2EA44F?style=for-the-badge" alt="40+ gateways" />
</p>

</div>

---

## 📖 Overview

**Anypay** is a comprehensive **PHP and Laravel payment library** for handling **multiple payment-gateway integrations** through a single, unified API. Instead of learning a different SDK for every bank or gateway, you write your checkout flow once and switch providers by changing a driver name — Anypay gives developers a **simple, uniform payment experience** with consistent `purchase → pay → verify` semantics across every gateway.

The package bundles **40+ drivers**, covering the major **Iranian bank and PSP gateways** (Mellat, Melli/Sadad, Saman, Parsian, Pasargad, Saderat, Zarinpal, IDPay, Zibal and many more), popular **wallet and installment (BNPL) providers** (Azki, Etebarino, Walleta, Digipay, Vandar, Toman), and **international gateways** such as **PayPal** and **Bitpay**. It ships with Laravel auto-discovery (service provider + facade) and works equally well in plain PHP projects.

> 🔎 **Keywords:** PHP payment gateway, Laravel payment library, multi-gateway payment, online payment integration, unified payment API, Iran payment gateway, Iranian bank integration, Zarinpal, Mellat, Saman, PayPal PHP, payment processing library, BNPL installment payment.

---

## ✨ Features

- 🔌 **40+ payment gateways** out of the box — one driver-based interface for all of them.
- 🧩 **Unified API** — the same `purchase()`, `pay()`, and `verify()` flow regardless of gateway.
- 🛟 **Robust error handling** — dedicated exceptions for invalid payments, failed purchases, and missing drivers/invoices.
- ⚙️ **Dynamic configuration** — pass settings inline or load them from a published config file.
- 🪝 **Trackable payment events** — hook into each stage of the payment lifecycle.
- 🧱 **Laravel-ready** — auto-registered service provider and `Anypay` facade (also usable in plain PHP).
- 💳 **Cards, wallets & installments** — supports standard card gateways plus BNPL / installment providers.

---

## 🏦 Supported Gateways

The following drivers are bundled under `src/Drivers/`:

| | | | |
| --- | --- | --- | --- |
| Aqayepardakht | Asanpardakht | Atipay | Azki *(installment)* |
| Behpardakht *(Mellat)* | Bitpay | Digipay | Etebarino *(installment)* |
| Fanavacard | Gooyapay | IDPay | Irankish |
| Jibit | Local | Minipay | Nextpay |
| Omidpay | Parsian | Pasargad | Payfa |
| Pay.ir | PayPal | Payping | Paystar |
| Poolam | Rayanpay | Sadad *(Melli)* | Saman |
| SEP *(Saman Electronic)* | Sepehr *(Saderat)* | Sepordeh | Sizpay |
| Toman | Vandar | Walleta *(installment)* | Yekpay |
| Zarinpal | Zibal | | |

---

## 🛠️ Tech Stack

| Component | Technology |
| --- | --- |
| Language | **PHP ≥ 7.2** |
| Framework | **Laravel** (service provider + facade; works standalone too) |
| HTTP client | **Guzzle** |
| Utilities | Carbon (dates), Ramsey UUID, chillerlan/php-cache |
| Install | **Composer** (PSR-4: `Morpheusadam\Anypay\`) |

<p>
  <img src="https://skillicons.dev/icons?i=php,laravel" alt="Tech stack" />
</p>

---

## 🚀 Getting Started

### Prerequisites

- **PHP 7.2+** and **Composer**

### Installation

```bash
composer require morpheusadam/anypay
```

In Laravel, the service provider and `Anypay` facade are auto-discovered — no manual registration required.

---

## 📦 Usage

### Create and pay an invoice

```php
$config  = ['driver' => 'gatewayName', 'api_key' => 'your_api_key'];
$anypay  = new Morpheusadam\Anypay\Anypay($config);

$invoice = new Morpheusadam\Anypay\Invoice();
$invoice->amount(1000); // amount in Rials

$anypay->via('gatewayName')->purchase($invoice)->pay();
```

### Quick pay with the `payWith` helper

```php
$config  = ['api_key' => 'your_api_key'];
$gateway = 'gatewayName';
$amount  = 1000; // amount in Rials

try {
    $anypay   = new Morpheusadam\Anypay\Anypay($config);
    $response = $anypay->payWith($gateway, $amount, $config);
    echo $response->getContent(); // payment response details
} catch (Exception $e) {
    echo 'Payment error: ' . $e->getMessage();
}
```

### Verify a payment (on the callback)

```php
try {
    $anypay  = new Morpheusadam\Anypay\Anypay($config);
    $receipt = $anypay->verify();
    echo 'Payment confirmed. Transaction ID: ' . $receipt->getTransactionId();
} catch (Exception $e) {
    echo 'Verification error: ' . $e->getMessage();
}
```

### Using the Laravel facade with a published config

```php
use Morpheusadam\Anypay\Facades\Anypay;

$invoice = (new Invoice)->amount(1000);

Anypay::via('driverName')->purchase($invoice, function ($driver, $transactionId) {
    // store $transactionId against the order
});
```

---

## 🤝 Contributing

Contributions are welcome! Open an [issue](https://github.com/morpheusadam/anypay/issues) or submit a pull request to add a gateway driver, fix a bug, or improve the docs.

## 📜 License

Distributed under the **MIT License**. See the [`LICENSE`](LICENSE) file for full terms.

---

<div align="center">

### 👤 Author — Morpheus Adam

Web developer & cheerful hacker · PHP · Laravel · Go

<p>
  <a href="https://github.com/morpheusadam"><img src="https://img.shields.io/badge/GitHub-morpheusadam-181717?style=for-the-badge&logo=github&logoColor=white" alt="GitHub" /></a>
  <a href="https://sam.zeonic.me"><img src="https://img.shields.io/badge/Website-sam.zeonic.me-4c1?style=for-the-badge&logo=googlechrome&logoColor=white" alt="Website" /></a>
  <a href="mailto:morpheusadam95@gmail.com"><img src="https://img.shields.io/badge/Email-Contact-D14836?style=for-the-badge&logo=gmail&logoColor=white" alt="Email" /></a>
</p>

⭐ **If Anypay simplified your checkout, consider giving it a star!** ⭐

</div>
