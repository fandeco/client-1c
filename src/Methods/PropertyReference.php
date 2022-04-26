<?php
namespace Fc\Methods;

use Fc\Interfaces\IDefaultMethod;
use Fc\Method;
use Fc\Traits\Send;

class PropertyReference extends Method implements IDefaultMethod
{
    protected $_server = 'region';
    protected $_uri = 'property_reference';

}
