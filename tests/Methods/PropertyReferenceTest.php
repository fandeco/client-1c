<?php

namespace Fc\Tests\Methods;

use Fc\Methods\PropertyReference;
use Fc\Tests\TestCase;

class PropertyReferenceTest extends TestCase
{
    public function testSetUri()
    {
        $Clinet = new PropertyReference();
        $response = $Clinet
            ->setUri('get_tickets')
            ->addParam('user_uuid', 'user_uuid')
            ->addParam('tickets_type', 'tickets_type')
            ->get()
            ->getResponse();
        $this->assertEquals('get_tickets', $response['message']);

    }

    public function testTo1C()
    {
        $Clinet = new PropertyReference();
        $response = $Clinet
            ->to1c()// Отправка запрос в 1с
            ->setTimeOut(5)
            ->get()
            ->getResponse();

        $this->assertTrue($Clinet->isError());
        $error = $Clinet->getAllErrors('responseCode');
        $this->assertEquals(0, $error['responseCode']);

    }

    public function testNoTo1C()
    {
        $Clinet = new PropertyReference();
        $response = $Clinet
            ->setTimeOut(5)
            ->get()
            ->getResponse();


        $this->assertNotTrue($Clinet->isError());

    }
}
