<?php
/**
 * Created by Andrey Stepanenko.
 * User: webnitros
 * Date: 07.09.2021
 * Time: 12:11
 */

namespace Fc\Tests\Methods;

use Fc\Methods\GetTickets;
use Fc\Tests\TestCase;

class GetTicketsTest extends TestCase
{
    public function testProcess()
    {
        $client = new GetTickets();
        $client
            ->get()
            ->get();
    }
}
