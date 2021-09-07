<?php

namespace Fc\Methods;

use Fc\Method;
use Fc\Traits\Send;
use Fc\Interfaces\IDefaultMethod;

class GetUsers extends Method
{
    protected $_server = 'crm';
    protected $_uri = 'get_users';

    public function defaultParams($params = [])
    {
        $params['tickets_type'] = '';
        return parent::defaultParams($params);
    }

    public function getUserByEmail($email)
    {
        return $this->findUser('email', $email);
    }

    public function getUserByUserName($user_name)
    {
        return $this->findUser('user_name', $user_name);
    }

    /**
     * Поиск пользователя по полю
     * @param $field
     * @param $userName
     * @return mixed|null
     */
    private function findUser($field, $userName)
    {
        if ($this->getStatusCode() === 200) {
            $response = $this->getResponse();
            $fullName = $userName;
            if (is_array($response['data'])) {
                foreach ($response['data'] as $datum) {
                    if ($datum[$field] == $fullName) {
                        $this->user = $datum;
                        return $datum;
                    }
                }
            }
        }
        return null;
    }


    /**
     * Вер
     * @return array
     */
    public function getTickets($email)
    {
        if ($user = $this->getUserByEmail($email)) {
            $uuid = $user['user_uuid'];
            $client = new GetTickets();
            $client->user_uuid($uuid)
                ->get();

            if ($client->getStatusCode() === 200) {
                return $client->getResponse();
            }
        }
        return null;
    }

    /**
     * Возвращает наряды пользоватея
     */
    public function getTasks($email)
    {
        $arrays = [];
        if ($user = $this->getUserByEmail($email)) {
            $user_uuid = $user['user_staff'];
            $client = new GetTicketsImplementer();
            $client->user_staff($user_uuid)
                ->to1c()
                ->get();


            if ($client->getStatusCode() === 200) {
                $response = $client->getResponse();
                if ($response['success']) {
                    foreach ($response['data'] as $data) {
                        $condition = $data['condition'];


                        switch ($condition) {
                            case 'Закрыто':
                            case 'Решено на первой линии':
                            case 'Выполнено. Требует подтверждения':

                                break;
                            case 'В работе':
                            case 'Зарегистрировано':
                            case 'Приостановлено':
                                $client = new GetTasks();
                                $client->user($user_uuid)
                                    ->tickets($data['uuid'])
                                    ->get();
                                if ($client->getStatusCode() === 200) {
                                    $response = $client->getResponse();
                                    if ($response && $response['success']) {
                                        if (!empty($response['data'][0])) {
                                            $arrays[] = $response['data'][0];
                                        }
                                    }
                                }
                                break;
                            default:
                                break;
                        }
                    }
                }
            }
        }
        return $arrays;


    }

}

