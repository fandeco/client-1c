<?php

namespace Fc;

use Exception;
use Fc\Interfaces\IMethod;
use GuzzleHttp;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;

class Method implements IMethod
{
    protected $class = "";

    protected $params = [];

    protected $timeout = 30;

    protected $error = null;

    protected $response = [];
    protected $_uri = null;

    protected $_server = null;
    protected $_method = 'POST';
    protected $_auth = null;

    /* @var string|null $_rest_url */
    private $_rest_url;

    /* @var string $_token */
    private $_token;

    protected $isRequestTo1c = false;
    /**
     * @var null|array
     */
    private $server1c;
	/**
	 * @var HandlerStack|null
	 */
	private $handler;

	/**
	 * @throws Exception
	 */
	public function __construct()
    {
        $this->class = get_called_class();

        if (!defined('FC_REST_URL')) {
            throw new Exception('Не указана константа FC_REST_URL');
        }

        if (!defined('FC_REST_TOKEN')) {
            throw new Exception('Не указана константа FC_REST_TOKEN');
        }

        $rest_url = rtrim(FC_REST_URL, '/') . '/';
        $this->_rest_url = $rest_url;
        $this->_token = FC_REST_TOKEN;
        $this->defaultParams();
    }

    public function getServer1C()
    {
        return $this->server1c;
    }

    /**
     * После вызова обращение будет уходить напрямую в 1с минуя rest сайт
     * @param bool $is
     * @return $this
     */
    public function to1c($is = true)
    {
        $this->isRequestTo1c = $is;
        return $this;
    }

    public function sendTo1c()
    {
        return $this->isRequestTo1c;
    }

	/**
	 * Установить guzzle handler
	 * @return $this
	 */
	public function setHandler(HandlerStack $stack){
		$this->handler = $stack;
		return $this;
	}

	/**
	 * @throws Exception
	 */
	public function getServer()
    {
        if ($this->isRequestTo1c) {
			if(!$this->handler) {
				$Client = new Client();
			}else{
				$Client = new Client([
										 'handler' => $this->handler,
									 ]);
			}


            $url = rtrim($this->_rest_url, '/');

            $Response = $Client->post($url . '/servers', [
                'json' => [
                    'method' => $this->_uri
                ]
            ]);
            $code = $Response->getStatusCode();

            if ($code !== 200) {
                $content = $Response->getBody()->getContents();
                throw new Exception($content);
            }

            $content = $Response->getBody()->getContents();
            if (!empty($content)) {
                $object = json_decode($content);
                if (!empty($object->data->server)) {
                    $this->server1c = (array)$object->data->server;
                } else {
                    throw new Exception('Не удалось получить сервер для method');
                }

            }
        }
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
	 * @return Method
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
        return !is_null($this->error);
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

        // Записываем сервер
        $this->getServer();

        $this->validate();
        $this->response = $this->send();
        return $this;
    }


    public function validate()
    {

    }


    private function send()
    {
        $this->_response();
        return $this->response;
    }

    private function getToken()
    {
        return $this->_token;
    }

    private function _response()
    {
        if ($this->sendTo1c()) {
            $rest = $this->server1c['url'] . $this->_uri;
            $login = @$this->server1c['login'];
            $password = @$this->server1c['password'];
            $options = [
                'auth' => [$login, $password, "basic"],
            ];
        } else {
            $rest = $this->_url();
            $options = [
                'auth' => ['', $this->getToken(), "basic"],
            ];
        }


        $options['json'] = [];
        $params = $this->getParams();

        if (!empty($params)) {
            $options['json'] = $params;
        }
		if($this->handler) {
			$client = new GuzzleHttp\Client([
												'handler'=>$this->handler,
												'headers' => ['Content-Type' => 'application/json'],
												'verify' => false,
												'timeout' => $this->timeout,
											]);
		}else {
			$client = new GuzzleHttp\Client([
												'headers' => ['Content-Type' => 'application/json'],
												'verify'  => FALSE,
												'timeout' => $this->timeout,
											]);
		}

        if (!$this->error) {
            $result = null;
            $isError = false;
            $json = null;
            $code = null;
            try {
                $response = $client->request($this->_method, $rest, $options);
                $json = $response->getBody()->getContents();
                $code = $response->getStatusCode();

                if (!is_array(json_decode($json, true))) {
                    $result = $json;
                } else {
                    $result = json_decode($json, true);
                }
            } catch (GuzzleHttp\Exception\ClientException $e) {
                if (!$this->error) {
                    $this->error[] = "Ошибка клиента";
                }

                $response = $e->getResponse();
                $isError = true;
                $code = $e->getCode();
                $json = $response->getBody()->getContents();
            } catch (GuzzleHttp\Exception\ServerException $e) {
                if (!$this->error) {
					$this->error[] = "Ошибка сервера";
				}
                $code = $e->getCode();
                $response = $e->getResponse();
                $isError = true;
                $json = $response->getBody()->getContents();
            } catch (GuzzleHttp\Exception\ConnectException $e) {
                if (!$this->error) {
                    $this->addError("Слишком долгий ответ от сервера");
                }
                $response = $e->getResponse();
                $code = $e->getCode();
                $isError = true;
                $result = $response;
            }

            if (!$code && method_exists($e, 'getCode')) {
                $code = $e->getCode();
            }

            if ($isError) {
                $result = !empty($json) ? json_decode($json, true) : '';
                if (!is_array($result)) {
                    $result = $json;
                }
            }

            $this->responseCode = $code;
            $this->response = $result;
        }
    }

    protected $responseCode = null;


    private function _getHash()
    {
        $hash = [];
        $hash[] = $this->class;
        $hash[] = $this->_auth;
        $hash[] = $this->_method;
        $hash[] = $this->_rest_url;
        if (isset($this->formValue)) {
            $hash[] = json_encode($this->formValue);
        }
        return md5(implode('', $hash));
    }
}
