<?php
namespace Fc\Interfaces;

interface IChangeStatus{

    public function apiKey($api_key);

    public function id($id);

    public function message($message);

    public function status($status);

    public function data(array $data);

    public function get();
}
