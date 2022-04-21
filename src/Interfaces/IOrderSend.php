<?php
namespace Fc\Interfaces;

interface IOrderSend{

    public function number($number);

    public function client($client);

    public function get();
}
