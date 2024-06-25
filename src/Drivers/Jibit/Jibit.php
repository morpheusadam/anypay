<?php
namespace Morpheusadam\Anypay\Drivers\Jibit;

use Morpheusadam\Anypay\Abstracts\Driver;
use Morpheusadam\Anypay\Exceptions\InvalidPaymentException;
use Morpheusadam\Anypay\Contracts\ReceiptInterface;
use Morpheusadam\Anypay\Exceptions\PurchaseFailedException;
use Morpheusadam\Anypay\Invoice;
use Morpheusadam\Anypay\RedirectionForm;
use Morpheusadam\Anypay\Receipt;

class Jibit extends Driver
{
    /**
     * Jibit client
     *
     * @var JibitClient
     */
    protected $jibit;

    /**
     * Invoice
     *
     * @var Invoice
     */
    protected $invoice;

    /**
     * Driver settings
     *
     * @var object
     */
    protected $settings;

    /**
     * Payment URL
     *
     * @var string
     */
    protected $paymentUrl;

    public function __construct(Invoice $invoice, $settings)
    {
        $this->invoice($invoice);
        $this->settings = (object) $settings;
        $this->jibit = new JibitClient(
            $this->settings->apiKey,
            $this->settings->apiSecret,
            $this->settings->apiPaymentUrl,
            $this->settings->tokenStoragePath
        );
    }

    /**
     * Purchase invoice
     *
     * @return string
     * @throws PurchaseFailedException
     */
    public function purchase()
    {
        $amount = $this->invoice->getAmount() * ($this->settings->currency == 'T' ? 10 : 1); // Convert to Rial

        $requestResult = $this->jibit->paymentRequest(
            $amount,
            $this->invoice->getUuid(),
            $this->invoice->getDetail('mobile'),
            $this->settings->callbackUrl
        );


        if (! empty($requestResult['pspSwitchingUrl'])) {
            $this->paymentUrl = $requestResult['pspSwitchingUrl'];
        }

        if (! empty($requestResult['errors'])) {
            $errMsgs = array_map(function ($err) {
                return $err['code'];
            }, $requestResult['errors']);

            throw new PurchaseFailedException(implode('\n', $errMsgs));
        }

        $purchaseId = $requestResult['purchaseId'];
        $referenceNumber = $requestResult['clientReferenceNumber'];

        $this->invoice->detail('referenceNumber', $referenceNumber);
        $this->invoice->transactionId($purchaseId);

        return $purchaseId;
    }

    /**
     * Pay invoice
     *
     * @return RedirectionForm
     */
    public function pay() : RedirectionForm
    {
        $url = $this->paymentUrl;

        return $this->redirectWithForm($url, [], 'GET');
    }

    /**
     * Verify payment
     *
     * @return ReceiptInterface
     * @throws InvalidPaymentException
     * @throws PurchaseFailedException
     */
    public function verify(): ReceiptInterface
    {
        $purchaseId = $this->invoice->getTransactionId();

        $requestResult = $this->jibit->paymentVerify($purchaseId);

        if (! empty($requestResult['status']) && $requestResult['status'] === 'SUCCESSFUL') {
            $order = $this->jibit->getOrderById($purchaseId);

            $receipt = new Receipt('jibit', $purchaseId);
            return $receipt->detail('payerCard', $order['elements']['payerCardNumber'] ?? '');
        }

        throw new InvalidPaymentException('Payment encountered an issue.');
    }
}
