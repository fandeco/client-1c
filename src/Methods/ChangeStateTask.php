<?php
namespace Fc\Methods;

use Fc\Method;
use Fc\Traits\Send;

/**
 * Смена статуса наряда
 */
class ChangeStateTask extends Method
{
    protected $_server = 'crm';
    protected $_uri = 'change_state_task';
}
