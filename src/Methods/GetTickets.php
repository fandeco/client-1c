<?php

namespace Fc\Methods;

use Fc\Method;
use Fc\Traits\Send;
use Fc\Interfaces\IDefaultMethod;

class GetTickets extends Method
{
    protected $_server = 'crm';
    protected $_uri = 'get_tickets';

    public function defaultParams($params = [])
    {
        $params['tickets_type'] = '';
        $params['ticket_uuid'] = '';
        return parent::defaultParams($params);
    }

    public function user_uuid($uuid)
    {
        $value = is_array($uuid) ? $uuid : [$uuid];
        $this->addParam('user_uuid', $value);
        return $this;
    }

}

