<?php
namespace Fc\Methods;

use Fc\Method;
use Fc\Traits\Send;
use Fc\Interfaces\IChangeStatus;

/**
 * Изменить ответственного
 */
class ChangeResponsible extends Method
{
    protected $_server = 'crm';
    protected $_uri = 'change_responsible';
}
