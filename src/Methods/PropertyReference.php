<?php
namespace Fc\Methods;

use Fc\Method;
use Fc\Traits\Send;
use Fc\Interfaces\IDefaultMethod;

class PropertyReference extends Method implements IDefaultMethod
{
    protected $_server = 'region';
    protected $_uri = 'property_reference';

}
