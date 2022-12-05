<?php
/**
 * Created by Andrey Stepanenko.
 * User: webnitros
 * Date: 19.08.2021
 * Time: 17:06
 */

namespace Fc\Tests\Methods;

use Fc\Methods\Marketplace;
use Fc\Methods\Stocks;
use Fc\Tests\TestCase;

class MarketplaceTest extends TestCase
{

    public function testSite()
    {
        $Clinet = new Marketplace();
        $Clinet
            ->name('ozon')
            ->get();
        $count = count($Clinet->getData());
        $this->assertEqualsWithDelta(3000, $count, 1000, "Маловато чето!");
    }
}
