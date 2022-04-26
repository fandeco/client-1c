<?php

namespace Fc\Methods;

use Fc\Method;
use Fc\Traits\Send;

class Prices extends Method
{
    protected $_server = 'retail';
    protected $_uri = 'prices';

    public function uuid($vendor_uuid = "")
    {
        $vendor_uuid = trim($vendor_uuid);
        if (empty($vendor_uuid)) {
            $this->addError("Добавте артикул");
        } else if (strlen($vendor_uuid) != 36) {
            $this->addError("Минимальная длиная currency 36 символа");
        } else {
            $this->addParam('vendor_uuid', $vendor_uuid);
        }
        return $this;
    }

    public function currency($currency = "RUB")
    {
        $currency = trim($currency);
        if (empty($currency)) {
            $this->addError("Добавьте тип цены");
        } else if (strlen($currency) != 3) {
            $this->addError("Минимальная длиная currency 3 символа");
        } else {
            $this->addParam('currency', $currency);
        }
        return $this;
    }


    public function code($code)
    {
        if (!$code) {
            $this->addError("Вы указале не верный код цены:{$code}");
        } else {
            $this->addParam('currency_code', $code);
        }
        return $this;
    }
}

