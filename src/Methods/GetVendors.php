<?php
namespace Fc\Methods;

use Fc\Method;
use Fc\Traits\Send;
use Fc\Interfaces\IDefaultMethod;

class GetVendors extends Method
{
    protected $_server = 'retail';
    protected $_uri = 'get_vendors';

}
