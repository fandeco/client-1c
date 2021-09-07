<?php

namespace Fc\Traits;

use Fc\Config;
use GuzzleHttp;
use Fc\Cache;

trait Send
{
    private function send()
    {
        if (!$this->cache) {
            $this->_response();
        } else {
            $this->_cache();
        }
        return $this->response;
    }

    private function _response()
    {
        $rest = $this->_url();
        $login = @$this->_auth['login'];
        $password = @$this->_auth['password'];
        $options = [
            'auth' => [$login, $password, "basic"],
        ];

        $options['json'] = [];
        $params = $this->getParams();
        $params['cache'] = $this->cacheRest;

        if (!empty($params)) {
            $options['json'] = $params;
        }

        $client = new GuzzleHttp\Client([
            'headers' => ['Content-Type' => 'application/json'],
            'verify' => false,
            'timeout' => $this->timeout,
        ]);

        if (count($this->error) === 0) {
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
                    if ($this->cache) {
                        $cache = new Cache($this->cacheTime);
                        $cache->set($this->_getHash(), $result);
                    }
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
                if (!$this->error) $this->error[] = "Ошибка сервера";
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

    private function _cache()
    {
        $hash = $this->_getHash();
        $cache = new Cache($this->cacheTime);
        if ($cache->isCache($hash)) {
            $result = $cache->get($hash);
            $this->response = json_decode($result, true);
        } else {
            $this->_response();
        }
    }

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
