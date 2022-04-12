<?php
/**
 * Created by Andrey Stepanenko.
 * User: webnitros
 * Date: 08.09.2021
 * Time: 19:19
 */

namespace Fc\Tests\Methods;

use Fc\Methods\GetTaskByNumber;
use Fc\Tests\TestCase;

class GetTaskByNumberTest extends TestCase
{

    public function testServerRest()
    {

        $Handler = new GetTaskByNumber();
        $response = $Handler
            ->to1c(true)
            ->number('0000012501')
            ->get()
            ->getResponse();


        echo '<pre>';
        print_r($response);
        die;

    }


    public function testNumber()
    {
        $Handler = new GetTaskByNumber();
        $response = $Handler
            ->number('0000012501')
            ->get()
            ->getResponse();
        echo '<pre>';
        print_r($response);
        die;
    }
}
