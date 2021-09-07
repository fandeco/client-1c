<?php
/**
 * Created by Andrey Stepanenko.
 * User: webnitros
 * Date: 19.08.2021
 * Time: 16:23
 */

namespace Fc\Tests\Methods;

use Fc\Config;
use Fc\Methods\GetTickets;
use Fc\Methods\GetUsers;
use Fc\Tests\TestCase;
use Mockery;

class GetUsersTest extends TestCase
{
    public function testGet()
    {
        // Настроить заглушку.

        $stub = Mockery::mock(GetUsers::class)
            ->makePartial(); // брать методы из родителя

        $stub->shouldReceive('getResponse')
            ->andReturn($this->response1c([
                [
                    'user_uuid' => '7f5d6e0d-8572-11eb-9519-005056b4b00e',
                    'user_staff' => '0b6045fd-8576-11eb-9519-005056b4b00e',
                    'user_name' => 'Андрей Степаненко',
                    'email' => 'stepanenko@technolight.ru',
                    'department' => 'Интернет проектыs',
                ]
            ]));
        $stub->shouldReceive('getStatusCode')
            ->andReturn(200);

        $stub->get();
        $data = $stub->getUserByEmail('stepanenko@technolight.ru');
        self::assertEquals('7f5d6e0d-8572-11eb-9519-005056b4b00e', $data['user_uuid']);
    }


    public function testGetTickets()
    {
        // Настроить заглушку.
        $client = new GetUsers();
        $data = $client->get()
            ->getTickets('stepanenko@technolight.ru');

    }

    public function testGetTasks()
    {
        // Настроить заглушку.
        $client = new GetUsers();
        $data = $client->get()
            ->getTasks('stepanenko@technolight.ru');

        echo '<pre>';
        print_r($data); die;

    }
}
