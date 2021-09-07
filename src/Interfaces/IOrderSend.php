<?php
namespace Fc\Interfaces;

interface IOrderSend{
    public function cache($bool);

    public function number($number);

    public function client($client);

    public function get();
}
