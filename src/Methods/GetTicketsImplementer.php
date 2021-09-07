<?php

namespace Fc\Methods;

use Fc\Method;

/**
 * Получение наряда
 * - user_staff обязателен
 */
class GetTicketsImplementer extends Method
{
    protected $_server = 'crm';
    protected $_uri = 'get_tickets_implementer';


    public function user_staff($uuid)
    {
        $value = is_array($uuid) ? $uuid : [$uuid];
        $this->addParam('user_staff', $value);
        if (!isset($this->formValue['tickets_type'])) {
            $this->addParam('tickets_type', '');
        }
        return $this;
    }


    public function tickets_type($uuid)
    {
        $this->addParam('tickets_type', $uuid);
        return $this;
    }

}

