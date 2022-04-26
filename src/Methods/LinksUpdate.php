<?php

namespace Fc\Methods;

use Fc\Interfaces\IDefaultMethod;
use Fc\Method;
use Fc\Traits\Send;

/**
 * Отправка изображений
 */
class LinksUpdate extends Method implements IDefaultMethod
{
    protected $_server = 'region';
    protected $_uri = 'links_update';

}
