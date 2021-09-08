<?php
/**
 * Created by Andrey Stepanenko.
 * User: webnitros
 * Date: 08.09.2021
 * Time: 19:08
 */

namespace Fc\Tests\Methods;

use Fc\Methods\GetTasksByUser;
use Fc\Tests\TestCase;

class GetTasksByUserTest extends TestCase
{
    public function testUser_uuid()
    {
        $Handler = new GetTasksByUser();
        $response = $Handler
            ->user_staff('0b6045fd-8576-11eb-9519-005056b4b00e')
            ->get()
            ->getResponse();
echo '<pre>';
print_r($response); die;


    }
}
