<?php

namespace Fc\Methods;

use Fc\Method;
use Fc\Traits\Send;

class GetTaskByNumber extends Method
{
    protected $_server = 'crm';
    protected $_uri = 'get_task_by_number';

    public function number($num)
    {
        $this->addParam('number', $num);
        return $this;
    }

}

