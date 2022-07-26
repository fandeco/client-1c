<?php
/**
 * Created by Andrey Stepanenko.
 * User: webnitros
 * Date: 26.07.2022
 * Time: 14:40
 */

namespace Fc\Methods;


use Fc\Interfaces\IStocks;
use Fc\Method;

class StocksNoShowroom extends Method
{
    protected $_server = 'retail';
    protected $_uri = 'stocks_no_showroom';

    public function shop_ids(array $shops_eid)
    {
        $shop_ids = array_map('trim', $shops_eid);
        if (empty($shop_ids)) {
            $this->addError("Передан пусмой массив" . implode(',', $shop_ids));
        } else {
            $this->addParam('shop_ids', $shop_ids);
        }
        return $this;
    }
}
