<?php
namespace Fc\Methods;

use Fc\Method;
use Fc\Traits\Send;

class OrderExist extends Method
{
    protected $_server = 'region';
    protected $_uri = 'order_exist';

    public function number($number = 0)
    {
        $this->addParam('number', $number);
        return $this;
    }
}
