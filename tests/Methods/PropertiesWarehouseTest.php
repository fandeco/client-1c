<?php
namespace Fc\Tests\Methods;

use Fc\Methods\PropertiesWarehouse;
use Fc\Tests\TestCase;

class PropertiesWarehouseTest extends TestCase
{
    public function testSite()
    {
        $Client = new PropertiesWarehouse();

        $Client
            ->get();
        $count = count($Client->getResponse());
        $this->assertEqualsWithDelta(50, $count, 50, "Маловато чето!");
        $this->assertArrayHasKey('warehouse_id', $Client->getResponse()['warehouses'][0], "Криво чето!");
        // echo '<pre>';
        // print_r($Client->getResponse());
        // die;
    }
}
