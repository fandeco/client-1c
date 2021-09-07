<?php
namespace Fc\Methods;

use Fc\Method;
use Fc\Traits\Send;
use Fc\Interfaces\IChangeStatus;

/**
 * Редактировать наряд решения
 */
class EditSolutionTask extends Method
{
    protected $_server = 'crm';
    protected $_uri = 'edit_solution_task';
}
