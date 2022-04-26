<?php
namespace Fc\Methods;

use Fc\Method;

/**
 * Получение наряда
 * - task обязателен
 */
class GetTasks extends Method
{
    protected $_server = 'crm';
    protected $_uri = 'get_tasks';


    public function tickets($uuid)
    {
        $this->addParam('ticket_uuid', $uuid);
        return $this;
    }

    public function user($uuid)
    {
        $this->addParam('user_uuid', $uuid);
        return $this;
    }
}

