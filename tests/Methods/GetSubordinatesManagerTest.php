<?php
	/**
	 * Created by Andrey Stepanenko.
	 * User: webnitros
	 * Date: 19.08.2021
	 * Time: 17:06
	 */

	namespace Fc\Tests\Methods;

	use Fc\Methods\GetSubordinatesManager;
	use Fc\Tests\TestCase;

	class GetSubordinatesManagerTest extends TestCase
	{

		public function testSite()
		{
			$Client = new GetSubordinatesManager();
			$Client
				->email('kosarev@technolight.ru')
				->get()
			;
			$r = $Client->getResponse();
			$this->assertGreaterThan(0, $r['data'], "OK");
		}
	}
