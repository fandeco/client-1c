<?php

namespace Fc\Tests\Methods;

use Fc\Methods\PropertyReference;
use Fc\Tests\TestCase;

class PropertyReferenceTest extends TestCase
{
    public function testSetUri()
    {
        $Client = new PropertyReference();
        $response = $Client
            ->to1c()
            ->get()
            ->getResponse();

        $this->assertArrayHasKey('array', $response);

    }

    public function testTo1C()
    {
        $Client = new PropertyReference();
        $response = $Client
            ->to1c()// Отправка запрос в 1с
            ->setTimeOut(5)
            ->get()
            ->getResponse();

        $this->assertTrue($Client->isError());
        $error = $Client->getAllErrors('responseCode');
        $this->assertEquals(0, $error['responseCode']);

    }

    public function testNoTo1C()
    {
        $Client = new PropertyReference();
        $response = $Client
            ->setTimeOut(5)
            ->get()
            ->getResponse();


        $this->assertNotTrue($Client->isError());

    }
}
