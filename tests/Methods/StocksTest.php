<?php
/**
 * Created by Andrey Stepanenko.
 * User: webnitros
 * Date: 19.08.2021
 * Time: 17:06
 */

namespace Fc\Tests\Methods;

use Fc\Methods\Stocks;
use Fc\Tests\TestCase;

class StocksTest extends TestCase
{

    public function testSite()
    {
        $Clinet = new Stocks();
        $Clinet
            ->uuid('ad66b8f8-a535-11e7-812a-005056a9741d')
            ->get();
        $count = count($Clinet->getResponse());
        $this->assertEqualsWithDelta(3000, $count, 1000, "Маловато чето!");
    }
}
