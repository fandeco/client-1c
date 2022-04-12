<?php
/**
 * Created by Andrey Stepanenko.
 * User: webnitros
 * Date: 24.03.2021
 * Time: 22:49
 */

namespace Fc\Tests;


use Fc\Config;
use Mockery\Adapter\Phpunit\MockeryTestCase;

abstract class TestCase extends MockeryTestCase
{
    protected function setUp(): void
    {
        define('FC_REST_URL', "");
        define('FC_REST_TOKEN', "");
        parent::setUp();
    }


    /**
     * @param array $data
     * @param bool $success
     * @param string $message
     * @return array
     */
    public function response1c($data = [], $success = true, $message = '')
    {
        return [
            'success' => $success,
            'message' => $message,
            'data' => $data,
        ];
    }
}
