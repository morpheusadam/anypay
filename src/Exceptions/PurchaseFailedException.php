<?php

namespace Morpheusadam\Anypay\Exceptions;

use Exception;

class PurchaseFailedException extends Exception
{
    protected $message;

    public function __construct($message = null)
    {
        $this->message = $message;

        parent::__construct($message);
    }

    public function getErrorMessage(): string
    {
        return $this->message;
    }
    
}
