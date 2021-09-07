<?php
namespace Fc\Methods;

use Fc\Method;
use Fc\Traits\Send;
use Fc\Interfaces\IChangeStatus;

class GetStaffDepartment extends Method
{
    protected $_server = 'crm';
    protected $_uri = 'get_staff_department';
}
