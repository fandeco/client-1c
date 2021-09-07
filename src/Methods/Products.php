<?php

namespace Fc\Methods;

use Fc\Method;

class Products extends Method
{
    protected $_server = 'region';
    protected $_uri = 'products';

    public function artikuls($artikuls = [])
    {
        if (!is_array($artikuls)) {
            $this->addError("Добавте артикулы массивом");
        } else if (count($artikuls) == 0) {
            $this->addError("Добавте артикулы");
        } else {
            $artikuls = array_map('trim', $artikuls);
            $this->addParam('artikuls', $artikuls);
        }
        return $this;
    }

}
