<?php
namespace Fc\Methods;

use Fc\Interfaces\IChangeStatus;
use Fc\Method;
use Fc\Traits\Send;

class ChangeStatusCheck extends Method implements IChangeStatus
{
    protected $_server = 'test';
    protected $_uri = 'change_status_check';


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
