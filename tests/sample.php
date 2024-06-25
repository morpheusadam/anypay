<?php

public  function Payment()
    {
        $gateway = 'zarinpal';
        $amount = 1000;
        $paymentGateway = PaymentGeteway::where('name', $gateway)->first();
        if (!$paymentGateway) {
            return response()->json(["Field not found"]);
        }

        $credentials = [];
        switch ($gateway) {
            case "gooyapay":
            case "idpay":
            case "nextpay":
            case "parsian":
            case "payir":
            case "payping":
            case "poolam":
            case "saman":
            case "walleta":
            case "zarinpal":
            case "zibal":
            case "sepordeh":
            case "vandar":
            case "yekpay":
                $credentials['merchantId'] = $paymentGateway->value('api');
            case "atipay":
                $credentials['apikey'] = $paymentGateway->value('api');
            case "fanavacard":
                $credentials['username'] = $paymentGateway->value('username');
                $credentials['password'] = $paymentGateway->value('password');
            case "azki":
                $credentials['merchantId'] = $paymentGateway->value('api');
                $credentials['key'] = $paymentGateway->value('api_secret');
            case "paystar":
                $credentials['gatewayId'] = $paymentGateway->value('terminal');
                $credentials['signKey'] = $paymentGateway->value('api');
            case "sep":
                $credentials['terminalId'] = $paymentGateway->value('terminal');
            case "sepehr":
                $credentials['terminalId'] = $paymentGateway->value('terminal');
            case "minipay":
                $credentials['merchantId'] = $paymentGateway->value('api');
            case "payfa":
                $credentials['apiKey'] = $paymentGateway->value('api');
            case "bitpay":
                $credentials['api_token'] = $paymentGateway->value('api');
                break;
            case "asanpardakht":
                $credentials['username'] = $paymentGateway->value('username');
                $credentials['password'] = $paymentGateway->value('password');
                $credentials['merchantConfigID'] = $paymentGateway->value('api');
            case "rayanpay":
                $credentials['username'] = $paymentGateway->value('username');
                $credentials['password'] = $paymentGateway->value('password');
                $credentials['client_id'] = $paymentGateway->value('api');
            case "behpardakht":
                $credentials['terminalId'] = $paymentGateway->value('terminal');
                $credentials['username'] = $paymentGateway->value('username');
                $credentials['password'] = $paymentGateway->value('password');
            case "digipay":
                $credentials['username'] = $paymentGateway->value('username');
                $credentials['password'] = $paymentGateway->value('password');
                $credentials['client_id'] = $paymentGateway->value('api');
                $credentials['client_secret'] = $paymentGateway->value('api_secret');
            case "pasargad":
                $credentials['merchantId'] = $paymentGateway->value('api');
                $credentials['terminalCode'] = $paymentGateway->value('terminal');
                $credentials['certificate'] = $paymentGateway->value('certificate');
            case "etebarino":
                $credentials['merchantId'] = $paymentGateway->value('api');
                $credentials['terminalId'] = $paymentGateway->value('terminal');
                $credentials['username'] = $paymentGateway->value('username');
                $credentials['password'] = $paymentGateway->value('password');
            case "omidpay":
                $credentials['username'] = $paymentGateway->value('username');
                $credentials['merchantId'] = $paymentGateway->value('api');
                $credentials['password'] = $paymentGateway->value('password');
            case "sizpay":
                $credentials['merchantId'] = $paymentGateway->value('api');
                $credentials['terminal'] = $paymentGateway->value('terminal');
                $credentials['username'] = $paymentGateway->value('username');
                $credentials['password'] = $paymentGateway->value('password');
                $credentials['SignData'] = $paymentGateway->value('api_secret');
            case "asanpardakht":
                $credentials['username'] = $paymentGateway->value('username');
                $credentials['password'] = $paymentGateway->value('password');
                $credentials['merchantConfigID'] = $paymentGateway->value('api');
            case "sadad":
                $credentials['key'] = $paymentGateway->value('api_secret');
                $credentials['merchantId'] = $paymentGateway->value('api');
                $credentials['terminalId'] = $paymentGateway->value('terminal');
                break;
            case "jibit":
                $credentials['apiKey'] = $paymentGateway->value('api');
                $credentials['apiSecret'] = $paymentGateway->value('api_secret');
                break;
            default:
                return response()->json(["Field not found"]);
                break;
        }
        // dd($credentials);
        return Anypay::payWith($gateway, $amount,  $credentials);
    }

    public  function storGeteway($gateway)
    {
        $paymentGateway = PaymentGeteway::update->where('name', $gateway)->first();
        if (!$paymentGateway) {
            return response()->json(["Field not found"]);
        }

        $credentials = [];
        switch ($gateway) {
            case "gooyapay":
            case "idpay":
            case "nextpay":
            case "parsian":
            case "payir":
            case "payping":
            case "poolam":
            case "saman":
            case "walleta":
            case "zarinpal":
            case "zibal":
            case "sepordeh":
            case "vandar":
            case "yekpay":
                $credentials['merchantId'] = $paymentGateway->value('api');
            case "atipay":
                $credentials['apikey'] = $paymentGateway->value('api');
            case "fanavacard":
                $credentials['username'] = $paymentGateway->value('username');
                $credentials['password'] = $paymentGateway->value('password');
            case "azki":
                $credentials['merchantId'] = $paymentGateway->value('api');
                $credentials['key'] = $paymentGateway->value('api_secret');
            case "paystar":
                $credentials['gatewayId'] = $paymentGateway->value('terminal');
                $credentials['signKey'] = $paymentGateway->value('api');
            case "sep":
                $credentials['terminalId'] = $paymentGateway->value('terminal');
            case "sepehr":
                $credentials['terminalId'] = $paymentGateway->value('terminal');
            case "minipay":
                $credentials['merchantId'] = $paymentGateway->value('api');
            case "payfa":
                $credentials['apiKey'] = $paymentGateway->value('api');
            case "bitpay":
                $credentials['api_token'] = $paymentGateway->value('api');
                break;
            case "asanpardakht":
                $credentials['username'] = $paymentGateway->value('username');
                $credentials['password'] = $paymentGateway->value('password');
                $credentials['merchantConfigID'] = $paymentGateway->value('api');
            case "rayanpay":
                $credentials['username'] = $paymentGateway->value('username');
                $credentials['password'] = $paymentGateway->value('password');
                $credentials['client_id'] = $paymentGateway->value('api');
            case "behpardakht":
                $credentials['terminalId'] = $paymentGateway->value('terminal');
                $credentials['username'] = $paymentGateway->value('username');
                $credentials['password'] = $paymentGateway->value('password');
            case "digipay":
                $credentials['username'] = $paymentGateway->value('username');
                $credentials['password'] = $paymentGateway->value('password');
                $credentials['client_id'] = $paymentGateway->value('api');
                $credentials['client_secret'] = $paymentGateway->value('api_secret');
            case "pasargad":
                $credentials['merchantId'] = $paymentGateway->value('merchand');
                $credentials['terminalCode'] = $paymentGateway->value('terminal');
                $credentials['certificate'] = $paymentGateway->value('certificate');
            case "etebarino":
                $credentials['merchantId'] = $paymentGateway->value('api');
                $credentials['terminalId'] = $paymentGateway->value('terminal');
                $credentials['username'] = $paymentGateway->value('username');
                $credentials['password'] = $paymentGateway->value('password');
            case "omidpay":
                $credentials['username'] = $paymentGateway->value('username');
                $credentials['merchantId'] = $paymentGateway->value('api');
                $credentials['password'] = $paymentGateway->value('password');
            case "sizpay":
                $credentials['merchantId'] = $paymentGateway->value('api');
                $credentials['terminal'] = $paymentGateway->value('terminal');
                $credentials['username'] = $paymentGateway->value('username');
                $credentials['password'] = $paymentGateway->value('password');
                $credentials['SignData'] = $paymentGateway->value('api_secret');
            case "asanpardakht":
                $credentials['username'] = $paymentGateway->value('username');
                $credentials['password'] = $paymentGateway->value('password');
                $credentials['merchantConfigID'] = $paymentGateway->value('api');
            case "sadad":
                $credentials['key'] = $paymentGateway->value('api_secret');
                $credentials['merchantId'] = $paymentGateway->value('api');
                $credentials['terminalId'] = $paymentGateway->value('terminal');
                break;
            case "jibit":
                $credentials['apiKey'] = $paymentGateway->value('api');
                $credentials['apiSecret'] = $paymentGateway->value('api_secret');
                break;
            default:
                return response()->json(["Field not found"]);
                break;
        }
        // dd($credentials);
        return;
    }

    
    public function whatsConfigName($getawayName)
    {
        switch ($getawayName) {
            case "gooyapay":
                return response()->json(['merchantId']);
                break;
            case "fanavacard":
                return response()->json(["username", "password"]);
                break;
            case "atipay":
                return response()->json(["apikey"]);
                break;
            case "asanpardakht":
                return response()->json(["username", "password", "merchantConfigID"]);
                break;
            case "behpardakht":
                return response()->json(["terminalId", "username", "password"]);
                break;
            case "digipay":
                return response()->json(["username", "password", "client_id", "client_secret"]);
                break;
            case "etebarino":
                return response()->json(["merchantId", "terminalId", "username", "password"]);
                break;
            case "idpay":
                return response()->json(["merchantId"]);
                break;
            case "irankish":
                return response()->json(["username", "password", "terminalId", "acceptorId", "pubKey"]);
                break;
            case "jibit":
                return response()->json(["apiKey", "apiSecret"]);
                break;
            case "nextpay":
                return response()->json(["merchantId"]);
                break;
            case "omidpay":
                return response()->json(["username", "merchantId", "password"]);
                break;
            case "parsian":
                return response()->json(["merchantId"]);
                break;
            case "pasargad":
                return response()->json(["merchantId", "terminalCode", "certificate"]);
                break;
            case "payir":
                return response()->json(["merchantId"]);
                break;
            case "paypal":
                return response()->json(["id"]);
                break;
            case "payping":
                return response()->json(["merchantId"]);
                break;
            case "paystar":
                return response()->json(["gatewayId", "signKey"]);
                break;
            case "poolam":
                return response()->json(["merchantId"]);
                break;
            case "sadad":
                return response()->json(["key", "merchantId", "terminalId", "PaymentIdentity"]);
                break;
            case "saman":
                return response()->json(["merchantId"]);
                break;
            case "sep":
                return response()->json(["terminalId"]);
                break;
            case "sepehr":
                return response()->json(["terminalId"]);
                break;
            case "walleta":
                return response()->json(["merchantId"]);
                break;
            case "yekpay":
                return response()->json(["merchantId"]);
                break;
            case "zarinpal":
                return response()->json(["merchantId"]);
                break;
            case "zibal":
                return response()->json(["merchantId"]);
                break;
            case "sepordeh":
                return response()->json(["merchantId"]);
                break;
            case "rayanpay":
                return response()->json(["merchantId"]);
                break;
            case "sizpay":
                return response()->json(["merchantId", "terminal", "username", "password", "SignData"]);
                break;
            case "vandar":
                return response()->json(["merchantId"]);
                break;
            case "aqayepardakht":
                return response()->json(["pin", "invoice_id", "mobile", "email"]);
                break;
            case "azki":
                return response()->json(["merchantId", "key"]);
                break;
            case "payfa":
                return response()->json(["apiKey"]);
                break;
            case "toman":
                return response()->json(["shop_slug", "auth_code", "data"]);
                break;
            case "bitpay":
                return response()->json(["api_token"]);
                break;
            case "minipay":
                return response()->json(["merchantId"]);
                break;
            default:
                return response()->json(["Field not found"]);
                break;
        }
    }
    