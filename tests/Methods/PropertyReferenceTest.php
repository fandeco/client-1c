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
            ->to1c()
            ->get()
            ->getResponse();

        $this->assertArrayHasKey('array', $response);

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
