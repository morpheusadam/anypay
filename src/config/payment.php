<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Driver
    |--------------------------------------------------------------------------
    |
    | This value determines which of the following gateway to use.
    | You can switch to a different driver at runtime.
    |
    */
    'default' => 'zarinpal',

    /*
    |--------------------------------------------------------------------------
    | List of Drivers
    |--------------------------------------------------------------------------
    |
    | These are the list of drivers to use for this package.
    | You can change the name. Then you'll have to change
    | it in the map array too.
    |
    */
    'drivers' => [
        
        'gooyapay' => [
            'apiPurchaseUrl' => 'https://gooyapay.ir/webservice/rest/PaymentRequest',
            'apiVerificationUrl' => 'https://gooyapay.ir/webservice/rest/PaymentVerification',
            'apiPaymentUrl' => 'https://gooyapay.ir/startPay/',
            'merchantId' => 'XXXX-XXXX-XXXX-XXXXXXXXXXXXXXXXXXXXX',
            'callbackUrl' => 'http://yoursite.com/path/to',
            'currency' => 'T', //Can be R, T (Rial, Toman)
        ],
        'fanavacard' => [
            'baseUri' => 'https://fcp.shaparak.ir',
            'apiPaymentUrl' => '_ipgw_//payment/',
            'apiPurchaseUrl' => 'ref-payment/RestServices/mts/generateTokenWithNoSign/',
            'apiVerificationUrl' => 'ref-payment/RestServices/mts/verifyMerchantTrans/',
            'apiReverseAmountUrl' => 'ref-payment/RestServices/mts/reverseMerchantTrans/',
            'username' => 'xxxxxxx',
            'password' => 'xxxxxxx',
            'callbackUrl' => 'http://yoursite.com/path/to',
            'currency' => 'T', //Can be R, T (Rial, Toman)
        ],
        'atipay' => [
            'atipayTokenUrl' => 'https://mipg.atipay.net/v1/get-token',
            'atipayRedirectGatewayUrl' => 'https://mipg.atipay.net/v1/redirect-to-gateway',
            'atipayVerifyUrl' => 'https://mipg.atipay.net/v1/verify-payment',
            'apikey' => '',
            'currency' => 'R', //Can be R, T (Rial, Toman)
            'callbackUrl' => 'http://yoursite.com/path/to',
            'description' => 'payment using Atipay',
        ],
        'asanpardakht' => [
            'apiPaymentUrl' => 'https://asan.shaparak.ir',
            'apiRestPaymentUrl' => 'https://ipgrest.asanpardakht.ir/v1/',
            'username' => '',
            'password' => '',
            'merchantConfigID' => '',
            'currency' => 'T', //Can be R, T (Rial, Toman)
            'callbackUrl' => 'http://yoursite.com/path/to',
            'description' => 'payment using asanpardakht',
        ],
        'behpardakht' => [
            'apiPurchaseUrl' => 'https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl',
            'apiPaymentUrl' => 'https://bpm.shaparak.ir/pgwchannel/startpay.mellat',
            'apiVerificationUrl' => 'https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl',
            'terminalId' => '',
            'username' => '',
            'password' => '',
            'callbackUrl' => 'http://yoursite.com/path/to',
            'description' => 'payment using behpardakht',
            'currency' => 'T', //Can be R, T (Rial, Toman)
            'cumulativeDynamicPayStatus' => false,
        ],
        'digipay' => [
            'apiOauthUrl' => 'https://api.mydigipay.com/digipay/api/oauth/token',
            'apiPurchaseUrl' => 'https://api.mydigipay.info/digipay/api/tickets/business',
            'apiVerificationUrl' => 'https://api.mydigipay.com/digipay/api/purchases/verify/',
            'username' => 'username',
            'password' => 'password',
            'client_id' => '',
            'client_secret' => '',
            'callbackUrl' => 'http://yoursite.com/path/to',
            'currency' => 'R', //Can be R, T (Rial, Toman)
        ],
        'etebarino' => [
            'apiPurchaseUrl' => 'https://api.etebarino.com/public/merchant/request-payment',
            'apiPaymentUrl' => 'https://panel.etebarino.com/gateway/public/ipg',
            'apiVerificationUrl' => 'https://api.etebarino.com/public/merchant/verify-payment',
            'merchantId' => '',
            'terminalId' => '',
            'username' => '',
            'password' => '',
            'callbackUrl' => 'http://yoursite.com/path/to',
            'description' => 'payment using etebarino',
        ],
        'idpay' => [
            'apiPurchaseUrl' => 'https://api.idpay.ir/v1.1/payment',
            'apiPaymentUrl' => 'https://idpay.ir/p/ws/',
            'apiSandboxPaymentUrl' => 'https://idpay.ir/p/ws-sandbox/',
            'apiVerificationUrl' => 'https://api.idpay.ir/v1.1/payment/verify',
            'merchantId' => '',
            'callbackUrl' => 'http://yoursite.com/path/to',
            'description' => 'payment using idpay',
            'sandbox' => false, // set it to true for test environments
            'currency' => 'R', //Can be R, T (Rial, Toman)
        ],
        'irankish' => [
            'apiPurchaseUrl' => 'https://ikc.shaparak.ir/api/v3/tokenization/make',
            'apiPaymentUrl' => 'https://ikc.shaparak.ir/iuiv3/IPG/Index/',
            'apiVerificationUrl' => 'https://ikc.shaparak.ir/api/v3/confirmation/purchase',
            'callbackUrl' => 'http://yoursite.com/path/to',
            'description' => 'payment using irankish',
            'terminalId' => '',
            'password' => '',
            'acceptorId' => '',
            'pubKey' => '',
            'currency' => 'T', //Can be R, T (Rial, Toman)
        ],
        'jibit' => [
            'apiPaymentUrl' => 'https://napi.jibit.ir/ppg/v3',
            'apiKey' => '',
            'apiSecret' => '',
           // You can change the token storage path in Laravel like this
           // 'tokenStoragePath' => function_exists('storage_path') ? storage_path('jibit/') : 'jibit/'
            'tokenStoragePath' => 'jibit/',
            'callbackUrl' => 'http://yoursite.com/path/to',
            'description' => 'payment using jibit',
            'currency' => 'T', // Can be R, T (Rial, Toman)
        ],
        'nextpay' => [
            'apiPurchaseUrl' => 'https://nextpay.org/nx/gateway/token',
            'apiPaymentUrl' => 'https://nextpay.org/nx/gateway/payment/',
            'apiVerificationUrl' => 'https://nextpay.org/nx/gateway/verify',
            'merchantId' => '',
            'callbackUrl' => 'http://yoursite.com/path/to',
            'description' => 'payment using nextpay',
            'currency' => 'T', //Can be R, T (Rial, Toman)
        ],
        'omidpay' => [
            'apiGenerateTokenUrl' => 'https://ref.sayancard.ir/ref-payment/RestServices/mts/generateTokenWithNoSign/',
            'apiPaymentUrl' => 'https://say.shaparak.ir/_ipgw_/MainTemplate/payment/',
            'apiVerificationUrl' => 'https://ref.sayancard.ir/ref-payment/RestServices/mts/verifyMerchantTrans/',
            'username' => '',
            'merchantId' => '',
            'password' => '',
            'callbackUrl' => '',
            'description' => 'payment using omidpay',
            'currency' => 'T', //Can be R, T (Rial, Toman)
        ],
        'parsian' => [
            'apiPurchaseUrl' => 'https://pec.shaparak.ir/NewIPGServices/Sale/SaleService.asmx?wsdl',
            'apiPaymentUrl' => 'https://pec.shaparak.ir/NewIPG/',
            'apiVerificationUrl' => 'https://pec.shaparak.ir/NewIPGServices/Confirm/ConfirmService.asmx?wsdl',
            'merchantId' => '',
            'callbackUrl' => 'http://yoursite.com/path/to',
            'description' => 'payment using parsian',
            'currency' => 'T', //Can be R, T (Rial, Toman)
        ],
        'pasargad' => [
            'apiPaymentUrl' => 'https://pep.shaparak.ir/payment.aspx',
            'apiGetToken' => 'https://pep.shaparak.ir/Api/v1/Payment/GetToken',
            'apiCheckTransactionUrl' => 'https://pep.shaparak.ir/Api/v1/Payment/CheckTransactionResult',
            'apiVerificationUrl' => 'https://pep.shaparak.ir/Api/v1/Payment/VerifyPayment',
            'merchantId' => '',
            'terminalCode' => '',
            'certificate' => '', // can be string (and set certificateType to xml_string) or an xml file path (and set cetificateType to xml_file)
            'certificateType' => 'xml_file', // can be: xml_file, xml_string
            'callbackUrl' => 'http://yoursite.com/path/to',
            'currency' => 'R', //Can be R, T (Rial, Toman)
        ],
        'payir' => [
            'apiPurchaseUrl' => 'https://pay.ir/pg/send',
            'apiPaymentUrl' => 'https://pay.ir/pg/',
            'apiVerificationUrl' => 'https://pay.ir/pg/verify',
            'merchantId' => '', // set it to `test` for test environments
            'callbackUrl' => 'http://yoursite.com/path/to',
            'description' => 'payment using payir',
            'currency' => 'T', //Can be R, T (Rial, Toman)
        ],
        'paypal' => [
            /* normal api */
            'apiPurchaseUrl' => 'https://www.paypal.com/cgi-bin/webscr',
            'apiPaymentUrl' => 'https://www.zarinpal.com/pg/StartPay/',
            'apiVerificationUrl' => 'https://ir.zarinpal.com/pg/services/WebGate/wsdl',

            /* sandbox api */
            'sandboxApiPurchaseUrl' => 'https://www.sandbox.paypal.com/cgi-bin/webscr',
            'sandboxApiPaymentUrl' => 'https://sandbox.zarinpal.com/pg/StartPay/',
            'sandboxApiVerificationUrl' => 'https://sandbox.zarinpal.com/pg/services/WebGate/wsdl',

            'mode' => 'normal', // can be normal, sandbox
            'id' => '', // Specify the email of the PayPal Business account
            'callbackUrl' => 'http://yoursite.com/path/to',
            'description' => 'payment using paypal',
            'currency' => 'T', //Can be R, T (Rial, Toman)
        ],
        'payping' => [
            'apiPurchaseUrl' => 'https://api.payping.ir/v2/pay/',
            'apiPaymentUrl' => 'https://api.payping.ir/v2/pay/gotoipg/',
            'apiVerificationUrl' => 'https://api.payping.ir/v2/pay/verify/',
            'merchantId' => '',
            'callbackUrl' => 'http://yoursite.com/path/to',
            'description' => 'payment using payping',
            'currency' => 'T', //Can be R, T (Rial, Toman)
        ],
        'paystar' => [
            'apiPurchaseUrl' => 'https://core.paystar.ir/api/pardakht/create/',
            'apiPaymentUrl' => 'https://core.paystar.ir/api/pardakht/payment/',
            'apiVerificationUrl' => 'https://core.paystar.ir/api/pardakht/verify/',
            'gatewayId' => '', // your gateway id
            'signKey' => '', // sign key of your gateway
            'callbackUrl' => 'http://yoursite.com/path/to',
            'description' => 'payment using paystar',
            'currency' => 'R', //Can be R, T (Rial, Toman)
        ],
        'poolam' => [
            'apiPurchaseUrl' => 'https://poolam.ir/invoice/request/',
            'apiPaymentUrl' => 'https://poolam.ir/invoice/pay/',
            'apiVerificationUrl' => 'https://poolam.ir/invoice/check/',
            'merchantId' => '',
            'callbackUrl' => 'http://yoursite.com/path/to',
            'description' => 'payment using poolam',
            'currency' => 'T', //Can be R, T (Rial, Toman)
        ],
        'sadad' => [
            'apiPaymentByMultiIdentityUrl' => 'https://sadad.shaparak.ir/VPG/api/v0/PaymentByMultiIdentityRequest',
            'apiPaymentByIdentityUrl' => 'https://sadad.shaparak.ir/api/v0/PaymentByIdentity/PaymentRequest',
            'apiPaymentUrl' => 'https://sadad.shaparak.ir/api/v0/Request/PaymentRequest',
            'apiPurchaseUrl' => 'https://sadad.shaparak.ir/Purchase',
            'apiVerificationUrl' => 'https://sadad.shaparak.ir/VPG/api/v0/Advice/Verify',
            'key' => '',
            'merchantId' => '',
            'terminalId' => '',
            'callbackUrl' => '',
            'currency' => 'T', //Can be R, T (Rial, Toman)
            'mode' => 'normal', // can be normal, PaymentByIdentity, PaymentByMultiIdentity,
            'PaymentIdentity' => '',
            'MultiIdentityRows' => [
                [
                    "IbanNumber" => '', // Sheba number (with IR)
                    "Amount" => 0,
                    "PaymentIdentity" => '',
                ],
            ],
            'description' => 'payment using sadad',
        ],
        'saman' => [
            'apiPurchaseUrl' => 'https://sep.shaparak.ir/Payments/InitPayment.asmx?WSDL',
            'apiPaymentUrl' => 'https://sep.shaparak.ir/payment.aspx',
            'apiVerificationUrl' => 'https://sep.shaparak.ir/payments/referencepayment.asmx?WSDL',
            'merchantId' => '',
            'callbackUrl' => '',
            'description' => 'payment using saman',
            'currency' => 'T', //Can be R, T (Rial, Toman)
        ],
        'sep' => [
            'apiGetToken' => 'https://sep.shaparak.ir/onlinepg/onlinepg',
            'apiPaymentUrl' => 'https://sep.shaparak.ir/OnlinePG/OnlinePG',
            'apiVerificationUrl' => 'https://sep.shaparak.ir/verifyTxnRandomSessionkey/ipg/VerifyTransaction',
            'terminalId' => '',
            'callbackUrl' => '',
            'description' => 'Saman Electronic Payment for Saderat & Keshavarzi',
            'currency' => 'T', //Can be R, T (Rial, Toman)
        ],
        'sepehr' => [
            'apiGetToken' => 'https://mabna.shaparak.ir:8081/V1/PeymentApi/GetToken',
            'apiPaymentUrl' => 'https://mabna.shaparak.ir:8080/pay',
            'apiVerificationUrl' => 'https://mabna.shaparak.ir:8081/V1/PeymentApi/Advice',
            'terminalId' => '',
            'callbackUrl' => '',
            'description' => 'payment using sepehr(saderat)',
            'currency' => 'T', //Can be R, T (Rial, Toman)
        ],
        'walleta' => [
            'apiPurchaseUrl' => 'https://cpg.walleta.ir/payment/request.json',
            'apiPaymentUrl' => 'https://cpg.walleta.ir/ticket/',
            'apiVerificationUrl' => 'https://cpg.walleta.ir/payment/verify.json',
            'merchantId' => '',
            'callbackUrl' => 'http://yoursite.com/path/to',
            'description' => 'payment using walleta',
            'currency' => 'T', //Can be R, T (Rial, Toman)
        ],
        'yekpay' => [
            'apiPurchaseUrl' => 'https://gate.yekpay.com/api/payment/server?wsdl',
            'apiPaymentUrl' => 'https://gate.yekpay.com/api/payment/start/',
            'apiVerificationUrl' => 'https://gate.yekpay.com/api/payment/server?wsdl',
            'fromCurrencyCode' => 978,
            'toCurrencyCode' => 364,
            'merchantId' => '',
            'callbackUrl' => 'http://yoursite.com/path/to',
            'description' => 'payment using yekpay',
        ],
        'zarinpal' => [
            /* normal api */
            'apiPurchaseUrl' => 'https://api.zarinpal.com/pg/v4/payment/request.json',
            'apiPaymentUrl' => 'https://www.zarinpal.com/pg/StartPay/',
            'apiVerificationUrl' => 'https://api.zarinpal.com/pg/v4/payment/verify.json',

            /* sandbox api */
            'sandboxApiPurchaseUrl' => 'https://sandbox.zarinpal.com/pg/services/WebGate/wsdl',
            'sandboxApiPaymentUrl' => 'https://sandbox.zarinpal.com/pg/StartPay/',
            'sandboxApiVerificationUrl' => 'https://sandbox.zarinpal.com/pg/services/WebGate/wsdl',

            /* zarinGate api */
            'zaringateApiPurchaseUrl' => 'https://ir.zarinpal.com/pg/services/WebGate/wsdl',
            'zaringateApiPaymentUrl' => 'https://www.zarinpal.com/pg/StartPay/:authority/ZarinGate',
            'zaringateApiVerificationUrl' => 'https://ir.zarinpal.com/pg/services/WebGate/wsdl',

            'mode' => 'normal', // can be normal, sandbox, zaringate
            'merchantId' => '',
            'callbackUrl' => 'http://yoursite.com/path/to',
            'description' => 'payment using zarinpal',
            'currency' => 'T', //Can be R, T (Rial, Toman)
        ],
        'zibal' => [
            /* normal api */
            'apiPurchaseUrl' => 'https://gateway.zibal.ir/v1/request',
            'apiPaymentUrl' => 'https://gateway.zibal.ir/start/',
            'apiVerificationUrl' => 'https://gateway.zibal.ir/v1/verify',

            'mode' => 'normal', // can be normal, direct

            'merchantId' => '',
            'callbackUrl' => 'http://yoursite.com/path/to',
            'description' => 'payment using zibal',
            'currency' => 'T', //Can be R, T (Rial, Toman)
        ],
        'sepordeh' => [
            'apiPurchaseUrl' => 'https://sepordeh.com/merchant/invoices/add',
            'apiPaymentUrl' => 'https://sepordeh.com/merchant/invoices/pay/id:',
            'apiDirectPaymentUrl' => 'https://sepordeh.com/merchant/invoices/pay/automatic:true/id:',
            'apiVerificationUrl' => 'https://sepordeh.com/merchant/invoices/verify',
            'mode' => 'normal', // can be normal, direct
            'merchantId' => '',
            'callbackUrl' => 'http://yoursite.com/path/to',
            'description' => 'payment using sepordeh',
            'currency' => 'T', //Can be R, T (Rial, Toman)
        ],
        'rayanpay' => [
            'apiPurchaseUrl' => 'https://bpm.shaparak.ir/pgwchannel/startpay.mellat',
            'apiTokenUrl' => 'https://pms.rayanpay.com/api/v1/auth/token/generate',
            'apiPayStart' => 'https://pms.rayanpay.com/api/v1/ipg/payment/start',
            'apiPayVerify' => 'https://pms.rayanpay.com/api/v1/ipg/payment/response/parse',
            'username' => '',
            'client_id' => '',
            'password' => '',
            'callbackUrl' => '',
            'currency' => 'R', //Can be R, T (Rial, Toman)
        ],
        'sizpay' => [
            'apiPurchaseUrl' => 'https://rt.sizpay.ir/KimiaIPGRouteService.asmx?WSDL',
            'apiPaymentUrl' => 'https://rt.sizpay.ir/Route/Payment',
            'apiVerificationUrl' => 'https://rt.sizpay.ir/KimiaIPGRouteService.asmx?WSDL',
            'merchantId' => '',
            'terminal' => '',
            'username' => '',
            'password' => '',
            'SignData' => '',
            'callbackUrl' => '',
            'currency' => 'R', //Can be R, T (Rial, Toman)
        ],
        'vandar' => [
            'apiPurchaseUrl' => 'https://ipg.vandar.io/api/v3/send',
            'apiPaymentUrl' => 'https://ipg.vandar.io/v3/',
            'apiVerificationUrl' => 'https://ipg.vandar.io/api/v3/verify',
            'callbackUrl' => '',
            'merchantId' => '',
            'description' => 'payment using Vandar',
            'currency' => 'T', //Can be R, T (Rial, Toman)
        ],
        'aqayepardakht' => [
            'apiPurchaseUrl' => 'https://panel.aqayepardakht.ir/api/v2/create',
            'apiPaymentUrl' => 'https://panel.aqayepardakht.ir/startpay/',
            'apiPaymentUrlSandbox' => 'https://panel.aqayepardakht.ir/startpay/sandbox/',
            'apiVerificationUrl' => 'https://panel.aqayepardakht.ir/api/v2/verify',
            'mode' => 'normal', //normal | sandbox
            'callbackUrl' => '',
            'pin' => '',
            'invoice_id' => '',
            'mobile' => '',
            'email' => '',
            'description' => 'payment using Aqayepardakht',
            'currency' => 'T', //Can be R, T (Rial, Toman)
        ],
        'azki' => [
            'apiPaymentUrl' => 'https://api.azkivam.com',
            'callbackUrl' => 'http://yoursite.com/path/to',
            'fallbackUrl' => 'http://yoursite.com/path/to',
            'merchantId' => '',
            'key' => '',
            'currency' => 'T', //Can be R, T (Rial, Toman)
            'description' => 'payment using azki',
        ],
        'payfa' => [
            'apiPurchaseUrl' => 'https://payment.payfa.com/v2/api/Transaction/Request',
            'apiPaymentUrl' => 'https://payment.payfa.ir/v2/api/Transaction/Pay/',
            'apiVerificationUrl' => 'https://payment.payfa.com/v2/api/Transaction/Verify/',
            'callbackUrl' => '',
            'apiKey' => '',
            'currency' => 'T', //Can be R, T (Rial, Toman)
        ],
        'toman' => [
            'base_url' => 'https://escrow-api.toman.ir/api/v1',
            'shop_slug' => '',
            'auth_code' => '',
            'data' => ''
        ],
        'bitpay' => [
            'apiPurchaseUrl' => 'https://bitpay.ir/payment/gateway-send',
            'apiPaymentUrl' => 'https://bitpay.ir/payment/gateway-{id_get}-get',
            'apiVerificationUrl' => 'https://bitpay.ir/payment/gateway-result-second',
            'callbackUrl' => '',
            'api_token' => '',
            'description' => 'payment using Bitpay',
            'currency' => 'R', //Can be R, T (Rial, Toman)
        ],
        'minipay' => [
            'apiPurchaseUrl' => 'https://v1.minipay.me/api/pg/request/',
            'apiPaymentUrl' => 'https://ipg.minipay.me/',
            'apiVerificationUrl' => 'https://v1.minipay.me/api/pg/verify/',
            'merchantId' => '',
            'callbackUrl' => 'http://yoursite.com/path/to',
            'description' => 'payment using Minipay.',
            'currency' => 'T', //Can be R, T (Rial, Toman)
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Class Maps
    |--------------------------------------------------------------------------
    |
    | This is the array of Classes that maps to Drivers above.
    | You can create your own driver if you like and add the
    | config in the drivers array and the class to use for
    | here with the same name. You will have to extend
    | Morpheusadam\Multipay\Abstracts\Driver in your driver.
    |
    */
    'map' => [
        'local' => \Morpheusadam\Multipay\Drivers\Local\Local::class,
        'gooyapay' => \Morpheusadam\Multipay\Drivers\Gooyapay\Gooyapay::class,
        'fanavacard' => \Morpheusadam\Multipay\Drivers\Fanavacard\Fanavacard::class,
        'asanpardakht' => \Morpheusadam\Multipay\Drivers\Asanpardakht\Asanpardakht::class,
        'atipay' => \Morpheusadam\Multipay\Drivers\Atipay\Atipay::class,
        'behpardakht' => \Morpheusadam\Multipay\Drivers\Behpardakht\Behpardakht::class,
        'digipay' => \Morpheusadam\Multipay\Drivers\Digipay\Digipay::class,
        'etebarino' => \Morpheusadam\Multipay\Drivers\Etebarino\Etebarino::class,
        'idpay' => \Morpheusadam\Multipay\Drivers\Idpay\Idpay::class,
        'irankish' => \Morpheusadam\Multipay\Drivers\Irankish\Irankish::class,
        'jibit' => \Morpheusadam\Multipay\Drivers\Jibit\Jibit::class,
        'nextpay' => \Morpheusadam\Multipay\Drivers\Nextpay\Nextpay::class,
        'omidpay' => \Morpheusadam\Multipay\Drivers\Omidpay\Omidpay::class,
        'parsian' => \Morpheusadam\Multipay\Drivers\Parsian\Parsian::class,
        'pasargad' => \Morpheusadam\Multipay\Drivers\Pasargad\Pasargad::class,
        'payir' => \Morpheusadam\Multipay\Drivers\Payir\Payir::class,
        'paypal' => \Morpheusadam\Multipay\Drivers\Paypal\Paypal::class,
        'payping' => \Morpheusadam\Multipay\Drivers\Payping\Payping::class,
        'paystar' => \Morpheusadam\Multipay\Drivers\Paystar\Paystar::class,
        'poolam' => \Morpheusadam\Multipay\Drivers\Poolam\Poolam::class,
        'sadad' => \Morpheusadam\Multipay\Drivers\Sadad\Sadad::class,
        'saman' => \Morpheusadam\Multipay\Drivers\Saman\Saman::class,
        'sep' => \Morpheusadam\Multipay\Drivers\SEP\SEP::class,
        'sepehr' => \Morpheusadam\Multipay\Drivers\Sepehr\Sepehr::class,
        'walleta' => \Morpheusadam\Multipay\Drivers\Walleta\Walleta::class,
        'yekpay' => \Morpheusadam\Multipay\Drivers\Yekpay\Yekpay::class,
        'zarinpal' => \Morpheusadam\Multipay\Drivers\Zarinpal\Zarinpal::class,
        'zibal' => \Morpheusadam\Multipay\Drivers\Zibal\Zibal::class,
        'sepordeh' => \Morpheusadam\Multipay\Drivers\Sepordeh\Sepordeh::class,
        'rayanpay' => \Morpheusadam\Multipay\Drivers\Rayanpay\Rayanpay::class,
        'sizpay' => \Morpheusadam\Multipay\Drivers\Sizpay\Sizpay::class,
        'vandar' => \Morpheusadam\Multipay\Drivers\Vandar\Vandar::class,
        'aqayepardakht' => \Morpheusadam\Multipay\Drivers\Aqayepardakht\Aqayepardakht::class,
        'azki' => \Morpheusadam\Multipay\Drivers\Azki\Azki::class,
        'payfa' => \Morpheusadam\Multipay\Drivers\Payfa\Payfa::class,
        'toman' => \Morpheusadam\Multipay\Drivers\Toman\Toman::class,
        'bitpay' => \Morpheusadam\Multipay\Drivers\Bitpay\Bitpay::class,
        'minipay' => \Morpheusadam\Multipay\Drivers\Minipay\Minipay::class,
    ]
];
