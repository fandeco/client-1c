<?php
namespace Fc\Interfaces;

interface ISubmitToSite{
    public function cache($bool);

    public function site($site);

    public function submit();

    public function full();

    public function get();
}
