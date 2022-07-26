<?php
/**
 * Created by Andrey Stepanenko.
 * User: webnitros
 * Date: 19.08.2021
 * Time: 17:06
 */

namespace Fc\Tests\Methods;

use Fc\Methods\Cache;
use Fc\Methods\Stocks;
use Fc\Tests\TestCase;

class CacheTest extends TestCase
{

    public function testCache()
    {
        $client = new Cache();
		$client->get();
		$r = $client->getResponse();
        $count = count($r);
        $this->assertGreaterThanOrEqual(2, $count, "Маловато");
    }
}
