<?php
namespace Fc\Interfaces;

interface IPrices{

    public function uuid($vendor_uuid);

    public function currency($currency);

    public function code($code);

    public function get();
}
