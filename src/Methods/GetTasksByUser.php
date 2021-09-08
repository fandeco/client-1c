<?php

namespace Fc\Methods;

use Fc\Method;
use Fc\Traits\Send;
use Fc\Interfaces\IDefaultMethod;

class GetTasksByUser extends Method
{
    protected $_server = 'crm';
    protected $_uri = 'get_tasks_by_user';

    public function defaultParams($params = [])
    {
        $params['tickets_type'] = '';
        return parent::defaultParams($params);
    }

    public function user_staff($uuid)
    {
        $value = is_array($uuid) ? $uuid : [$uuid];
        $this->addParam('user_staff', $value);
        return $this;
    }

}

