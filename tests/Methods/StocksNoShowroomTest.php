<?php
/**
 * Created by Andrey Stepanenko.
 * User: webnitros
 * Date: 26.07.2022
 * Time: 14:43
 */

namespace Fc\Tests\Methods;

use Fc\Methods\StocksNoShowroom;
use Fc\Tests;

class StocksNoShowroomTest extends Tests\TestCase
{

    public function testShop_ids()
    {
        $ShowRoom = new StocksNoShowroom();
        $response = $ShowRoom->shop_ids(["000000018", "000000006", "000000191"])->get()->getResponse();
        echo '<pre>';
        print_r($ShowRoom->getAllErrors());
        die;
    }
}
