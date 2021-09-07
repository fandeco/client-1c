<?php
namespace Fc\Tests\Methods;

use Fc\Methods\Products;
use Fc\Tests\TestCase;

class ProductsTest extends TestCase
{
    public function testSite()
    {
        $Clinet = new Products();
        $Clinet
            ->artikuls(["4690389138546_elektrostandard"])
            ->get();
        $this->assertArrayHasKey('4690389138546_elektrostandard', $Clinet->getResponse()['products'], "Продукта нет!");
        // echo '<pre>';
        // print_r($Clinet->getResponse());
        // die;
    }
}

