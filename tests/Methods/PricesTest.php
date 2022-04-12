<?php

namespace Fc\Tests\Methods;

use Fc\Methods\Prices;
use Fc\Tests\TestCase;

class PricesTest extends TestCase
{
    public function testSite()
    {
        $Clinet = new Prices();
        $Clinet
            ->to1c()
            ->uuid("ad66b8f8-a535-11e7-812a-005056a9741d")
            ->currency("RUB")
            ->code(643)
            ->get();

        echo '<pre>';
        print_r($Clinet->getResponse()); die;

        $count = count($Clinet->getResponse());
        $this->assertEqualsWithDelta(3000, $count, 1000, "Маловато чето!");
    }
}

