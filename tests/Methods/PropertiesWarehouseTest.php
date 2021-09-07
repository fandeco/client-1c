<?php
namespace Fc\Tests\Methods;

use Fc\Methods\PropertiesWarehouse;
use Fc\Tests\TestCase;

class PropertiesWarehouseTest extends TestCase
{
    public function testSite()
    {
        $Clinet = new PropertiesWarehouse();

        $Clinet
            ->get();
        $count = count($Clinet->getResponse());
        $this->assertEqualsWithDelta(50, $count, 50, "Маловато чето!");
        $this->assertArrayHasKey('warehouse_id', $Clinet->getResponse()['warehouses'][0], "Криво чето!");
        // echo '<pre>';
        // print_r($Clinet->getResponse());
        // die;
    }
}
