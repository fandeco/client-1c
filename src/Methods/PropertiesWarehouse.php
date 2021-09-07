<?php
namespace Fc\Methods;

use Fc\Method;
use Fc\Traits\Send;
use Fc\Interfaces\IDefaultMethod;

class PropertiesWarehouse extends Method implements IDefaultMethod
{
    protected $_server = 'retail';
    protected $_uri = 'properties_warehouse';

}
