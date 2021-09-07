<?php
namespace Fc\Methods;

use Fc\Method;
use Fc\Traits\Send;
use Fc\Interfaces\IChangeStatus;

/**
 * Смена статуса наряда
 */
class ChangeStateTask extends Method
{
    protected $_server = 'crm';
    protected $_uri = 'change_state_task';
}
