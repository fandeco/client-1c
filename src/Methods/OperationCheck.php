<?php

namespace Fc\Methods;

use Fc\Method;
use Fc\Traits\Send;
use Fc\Interfaces\IOperationCheck;

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
