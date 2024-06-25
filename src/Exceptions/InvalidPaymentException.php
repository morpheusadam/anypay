<?php

namespace Morpheusadam\Anypay\Exceptions;

class InvalidPaymentException extends \Exception
{
    //
    protected $message;

    public function __construct($message)
    {
        $this->message = $message;
        parent::__construct($message);
    }

    public function getErrorMessage()
    {
        return $this->message;
    }
}
