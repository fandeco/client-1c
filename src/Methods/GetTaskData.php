<?php
namespace Fc\Methods;

use Fc\Method;
use Fc\Traits\Send;
use Fc\Interfaces\IChangeStatus;

/**
 * Получение наряда
 * - task обязателен
 * - user обязателен
 */
class GetTaskData extends Method
{
    protected $_server = 'crm';
    protected $_uri = 'get_task_data';


    public function task($uuid)
    {
        $this->addParam('task_uuid', $uuid);
        return $this;
    }

    public function user($uuid)
    {
        $this->addParam('user_uuid', $uuid);
        return $this;
    }
}
