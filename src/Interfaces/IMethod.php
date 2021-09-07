<?php
namespace Fc\Interfaces;

interface IMethod{
    public function isError();

    public function getAllErrors();

    public function getStatusCode();

    public function getResponse();
}
