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
use GuzzleHttp\HandlerStack;
use GuzzleLogMiddleware\LogMiddleware;
use Monolog\Logger;

class MarketplaceTest extends TestCase
{

    public function testSite()
    {
        $Client = new Marketplace();
        $Client
            ->name('ozon')
            ->get();
        $count = count($Client->getData());
        $this->assertEqualsWithDelta(3000, $count, 2000, "Маловато чето!");
    }

	public function testHandler()
	{
		$Client = new Marketplace();
		$logger = new Logger('test');
		$stack = HandlerStack::create();
		$stack->push(new LogMiddleware($logger));
		$Client
			->setHandler($stack)
			->name('ozon')
			->get();
		$count = count($Client->getData());
		$this->assertEqualsWithDelta(3000, $count, 2000, "Маловато чето!");
	}
}
