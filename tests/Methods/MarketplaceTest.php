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
        $Clinet = new Marketplace();
        $Clinet
            ->name('ozon')
            ->get();
        $count = count($Clinet->getData());
        $this->assertEqualsWithDelta(3000, $count, 1000, "Маловато чето!");
    }

	public function testHandler()
	{
		$Clinet = new Marketplace();
		$logger = new Logger('test');
		$stack = HandlerStack::create();
		$stack->push(new LogMiddleware($logger));
		$Clinet
			->setHandler($stack)
			->name('ozon')
			->get();
		$count = count($Clinet->getData());
		$this->assertEqualsWithDelta(3000, $count, 1000, "Маловато чето!");
	}
}
