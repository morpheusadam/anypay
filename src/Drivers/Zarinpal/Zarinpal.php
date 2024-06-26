<?php

namespace Morpheusadam\Anypay\Drivers\Zarinpal;

use Morpheusadam\Anypay\Abstracts\Driver;
use Morpheusadam\Anypay\Contracts\DriverInterface;
use Morpheusadam\Anypay\Exceptions\InvalidPaymentException;
use Morpheusadam\Anypay\Exceptions\PurchaseFailedException;
use Morpheusadam\Anypay\Contracts\ReceiptInterface;
use Morpheusadam\Anypay\Drivers\Zarinpal\Strategies\Normal;
use Morpheusadam\Anypay\Drivers\Zarinpal\Strategies\Sandbox;
use Morpheusadam\Anypay\Drivers\Zarinpal\Strategies\Zaringate;
use Morpheusadam\Anypay\Exceptions\DriverNotFoundException;
use Morpheusadam\Anypay\Invoice;
use Morpheusadam\Anypay\RedirectionForm;

class Zarinpal extends Driver
{
    /**
     * Strategies map.
     *
     * @var array
     */
    public static $strategies = [
        'normal' => Normal::class,
        'sandbox' => Sandbox::class,
        'zaringate' => Zaringate::class,
    ];

    /**
     * Current strategy instance.
     *
     * @var DriverInterface $strategy
     */
    protected $strategy;

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
     * Zarinpal constructor.
     * Construct the class with the relevant settings.
     *
     * @param Invoice $invoice
     * @param $settings
     */
    public function __construct(Invoice $invoice, $settings)
    {
        $this->invoice = $invoice;
        $this->settings = (object) $settings;
        $this->strategy = $this->getFreshStrategyInstance($this->invoice, $this->settings);
    }

    /**
     * Purchase Invoice.
     *
     * @return string
     *
     * @throws PurchaseFailedException
     * @throws \SoapFault
     */
    public function purchase()
    {
        return $this->strategy->purchase();
    }

    /**
     * Pay the Invoice
     *
     * @return RedirectionForm
     */
    public function pay() : RedirectionForm
    {
        return $this->strategy->pay();
    }

    /**
     * Verify payment
     *
     * @return ReceiptInterface
     *
     * @throws InvalidPaymentException
     * @throws \SoapFault
     */
    public function verify() : ReceiptInterface
    {
        return $this->strategy->verify();
    }

    /**
     * Get zarinpal payment's strategy according to config's mode.
     *
     * @param Invoice $invoice
     * @param $settings
     * @return DriverInterface
     */
    protected function getFreshStrategyInstance($invoice, $settings) : DriverInterface
    {
        $strategy = static::$strategies[$this->getMode()] ?? null;

        if (! $strategy) {
            $this->strategyNotFound();
        }

        return new $strategy($invoice, $settings);
    }

    protected function strategyNotFound()
    {
        $message = sprintf(
            'Zarinpal payment mode not found (check your settings), valid modes are: %s',
            implode(',', array_keys(static::$strategies))
        );

        throw new DriverNotFoundException($message);
    }

    /**
     * Retrieve payment mode.
     *
     * @return string
     */
    protected function getMode() : string
    {
        return strtolower($this->settings->mode);
    }
}
