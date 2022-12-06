<?php
	/**
	 * Created by Andrey Stepanenko.
	 * User: webnitros
	 * Date: 19.08.2021
	 * Time: 17:06
	 */

	namespace Fc\Tests\Methods;

	use Fc\Methods\SubmitToSite;
	use Fc\Tests\TestCase;
	use GuzzleHttp\HandlerStack;
	use GuzzleLogMiddleware\LogMiddleware;
	use Monolog\Logger;

	class SubmitToSiteTest extends TestCase
	{
		public function testSite()
		{
			$Client = new SubmitToSite();

			$Client
				->site('fandeco.ru')
				->submit()
				->get()
			;

			$count = count($Client->getResponse()['response']['array']);
			$this->assertEqualsWithDelta(120000, $count, 120000, "Маловато чето!");
		}

		public function testHandler()
		{
			$Client = new SubmitToSite();
			$logger = new Logger('test');
			$stack  = HandlerStack::create();
			$stack->push(new LogMiddleware($logger));
			$Client
				->setHandler($stack)
				->site('fandeco.ru')
				->submit()
				->get()
			;
			$count = count($Client->getResponse()['response']['array']);
			$this->assertEqualsWithDelta(120000, $count, 120000, "Маловато чето!");
		}
	}
