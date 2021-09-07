<?php

namespace Fc\Methods;

use Fc\Method;
use Fc\Traits\Send;
use Fc\Interfaces\IDefaultMethod;

/**
 * Отправка изображений
 */
class LinksUpdate extends Method implements IDefaultMethod
{
    protected $_server = 'region';
    protected $_uri = 'links_update';

}
