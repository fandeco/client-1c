<?php
namespace Fc\Methods;

use Fc\Method;
use Fc\Traits\Send;
use Fc\Interfaces\IDefaultMethod;

class OrderPayment extends Method
{
    protected $_server = 'region';
    protected $_uri = 'order_payment';

}

