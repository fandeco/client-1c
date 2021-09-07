<?php

namespace Fc\Interfaces;

interface IOperationCheck
{
    public function cache($bool);

    public function id($order_id);

    public function get();
}
