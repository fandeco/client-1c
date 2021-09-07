<?php
namespace Fc\Methods;

use Fc\Method;
use Fc\Interfaces\IStocks;

class Stocks extends Method implements IStocks
{
    protected $_server = 'retail';
    protected $_uri = 'stocks';


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
}
