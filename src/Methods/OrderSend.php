<?php
namespace Fc\Methods;

use Fc\Interfaces\IOrderSend;
use Fc\Method;
use Fc\Traits\Send;

class OrderSend extends Method implements IOrderSend
{
    protected $_server = 'region';
    protected $_uri = 'order_send';

    public function number($number = 0)
    {
        $this->addParam('number', $number);
        return $this;
    }

    public function client($client = 0)
    {
        $this->addParam('client', $client);
        return $this;
    }
}
