<?php
namespace Fc\Tests\Methods;

use Fc\Methods\Products;
use Fc\Tests\TestCase;

class ProductsTest extends TestCase
{
    public function testSite()
    {
        $Client = new Products();
        $Client
            ->artikuls(["4690389138546_elektrostandard"])
            ->get();
        $this->assertArrayHasKey('4690389138546_elektrostandard', $Client->getResponse()['products'], "Продукта нет!");
        // echo '<pre>';
        // print_r($Client->getResponse());
        // die;
    }
}

