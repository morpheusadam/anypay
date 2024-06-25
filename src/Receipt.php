<?php

namespace Morpheusadam\Anypay;

use Morpheusadam\Anypay\Abstracts\Receipt as ReceiptAbstract;
use Morpheusadam\Anypay\Traits\HasDetail;

class Receipt extends ReceiptAbstract
{
    use HasDetail;

    /**
     * Add given value into details
     *
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->detail($name, $value);
    }

    /**
     * Retrieve given value from details
     *
     * @param $name
     */
    public function __get($name)
    {
        return $this->getDetail($name);
    }
}
