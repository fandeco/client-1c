<?php

namespace Fc\Methods;

use Fc\Interfaces\ISubmitToSite;
use Fc\Method;

class SubmitToSite extends Method implements ISubmitToSite
{
    protected $_server = 'region';
    protected $_uri = 'submit_to_site';


    public function site($site)
    {
        $site = trim($site);
        if (empty($site)) {
            $this->addError("Добавте код сайта");
        } else {
            $this->addParam('site', $site);
        }
        return $this;
    }


    public function submit()
    {
        $this->addParam('mode', 'submit');
        return $this;
    }
    public function full()
    {
        $this->addParam('mode', 'full');
        return $this;
    }

    public function validate()
    {
        if (empty($this->params['site'])) {
            $this->addError("Добавьте site (домен сайта для которого хотите получить товары)");
        }

        if (empty($this->params['mode'])) {
            $this->addError("Укажите mode, submit - товары с галкой 'Выгружать на сайт', full - все товары в том числе которые не нужно выгружать на сайт");
        }
    }


}
