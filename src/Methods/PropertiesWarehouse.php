<?php
namespace Fc\Methods;

use Fc\Interfaces\IDefaultMethod;
use Fc\Method;
use Fc\Traits\Send;

class PropertiesWarehouse extends Method implements IDefaultMethod
{
    protected $_server = 'retail';
    protected $_uri = 'properties_warehouse';

}
