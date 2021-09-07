<?php
namespace Fc\Methods;

use Fc\Method;
use Fc\Traits\Send;
use Fc\Interfaces\IChangeStatus;

class ChangeStatusOrder extends Method implements IChangeStatus
{
    protected $_server = 'test';
    protected $_uri = 'change_status_order';

    public function apiKey($api_key = "") {
        $this->addParam('api_key', $api_key);
        return $this;
    }

    public function id($id = "") {
        $this->addParam('id', $id);
        return $this;
    }

    public function message($message = "") {
        $this->addParam('message', $message);
        return $this;
    }

    public function status($status = "") {
        $this->addParam('status', $status);
        return $this;
    }

    public function data($data = []) {
        $this->addParam('data', $data);
        return $this;
    }
}
