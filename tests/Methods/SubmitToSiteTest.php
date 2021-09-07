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

class SubmitToSiteTest extends TestCase
{
    public function testSite()
    {
        $Clinet = new SubmitToSite();

        $Clinet
            ->site('fandeco.ru')
            ->submit()
            ->get();

        $count = count($Clinet->getResponse()['response']['array']);
        $this->assertEqualsWithDelta(120000, $count, 120000, "Маловато чето!");
    }
}
