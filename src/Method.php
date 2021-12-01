<?php

namespace Fc;

use Fc\Config;
use Fc\Interfaces\IMethod;
use Fc\Exceptions\AuthException;
use Fc\Traits\Send;
use Fc\Exceptions\ConnectException;

class Method implements IMethod
{
    use Send;

    protected $class = "";

    protected $params = [];

    protected $timeout = 30;

    protected $cache = false;

    protected $cacheTime = 0;

    protected $cacheRest = true;

    protected $error = null;

    protected $response = [];
    protected $_uri = null;

    protected $_server = null;
    protected $_method = 'POST';

    /* @var string|null $_rest_url */
    private $_rest_url;

    /* @var array $_auth */
    private $_auth;

    public function __construct()
    {
        $this->class = get_called_class();
        $this->_config();
        $this->defaultParams();
    }

    protected $isRequestTo1c = false;


    /**
     * После вызова обращение будет уходить напрямую в 1с минуя rest сайт
     * @param bool $is
     * @return $this
     */
    public function to1c($is = true)
    {
        $config = Config::getInstance()->get();
        if (!array_key_exists('FC_AUTH', $config)) {
            throw new ConnectException('Не указан ключ в конфиге FC_AUTH');
        }

        if (!array_key_exists($this->_server, $config['FC_AUTH'])) {
            throw new ConnectException('Не указаны данный для авторизации на сервере' . $this->_server);
        }

        $auth = $config['FC_AUTH'][$this->_server];
        if (!array_key_exists('login', $auth)) {
            throw new ConnectException('Не указаны login в конфиге для сервере' . $this->_server);
        }

        if (!array_key_exists('password', $auth)) {
            throw new ConnectException('Не указаны password в конфиге для сервере' . $this->_server);
        }

        $this->setConfig($config['FC_SERVER'][$this->_server], $auth['login'], $auth['password']);
        $this->isRequestTo1c = $is;
        return $this;
    }

    public function cache($bool = true)
    {
        $this->cache = $bool;
        return $this;
    }


    public function cacheRest($bool = true)
    {
        $this->cacheRest = $bool;
        return $this;
    }

    private function setConfig($rest_url, $login, $password)
    {
        $this->_rest_url = $rest_url;
        $this->_auth = [
            'login' => $login,
            'password' => $password,
        ];
    }

    private function _config()
    {
        $config = Config::getInstance()->get();
        $this->setConfig($config['FC_REST_URL'], $config['FC_REST_LOGIN'], $config['FC_REST_PASSWORD']);
    }

    /**
     * @param $uri
     * @return $this
     */
    public function setUri($uri)
    {
        $this->_uri = $uri;
        return $this;
    }


    /**
     * GuzzelClinet timeout
     * @param int $time
     */
    public function setTimeOut(int $time)
    {
        $this->timeout = $time;
        return $this;
    }

    private function _url()
    {
        return $this->_rest_url . $this->_uri;
    }


    public function isError()
    {
        return !is_null(this->error);
    }

    public function getAllErrors()
    {
        return [
            'responseCode' => $this->responseCode,
            'response' => $this->error
        ];
    }

    public function getStatusCode()
    {
        return $this->responseCode;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function addError($msg)
    {
        $this->error[] = $msg;
    }

    public function cacheTime(int $time)
    {
        $this->cacheTime = $time;
        return $this;
    }

    /**
     * Параметры по умолчанию
     * @param array $params
     * @return $this
     */
    public function defaultParams($params = [])
    {
        if (is_array($params) && count($params) > 0) {
            $this->params = $params;
        }
        return $this;
    }


    public function addParam($key, $value)
    {
        $this->params[$key] = $value;
        return $this;
    }


    public function getParams()
    {
        return $this->params;
    }

    public function get()
    {
        $this->validate();
        $this->response = $this->send();
        return $this;
    }


    public function validate()
    {

    }
}
