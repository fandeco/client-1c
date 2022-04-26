<?php

namespace Fc\Methods;

use Fc\Interfaces\IOperationCheck;
use Fc\Method;
use Fc\Traits\Send;

class OperationCheck extends Method implements IOperationCheck
{
    protected $_server = 'region';
    protected $_uri = 'operation_check';

    public function id($order_id = "")
    {
        $this->addParam('order_id', $order_id);
        return $this;
    }
}
