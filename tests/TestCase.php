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
        Config::getInstance([
            "FC_AUTH" => [
                "region" => [
                    "login" => "webUserRest",
                    "password" => "4G47r_3",
                ],
                "retail" => [
                    "login" => "webUserRest",
                    "password" => "4G47r_3",
                ],
                "test" => [
                    "login" => "webUserRest",
                    "password" => "4G47r_3",
                ],
                "crm" => [
                    "login" => "webUserRest",
                    "password" => "4G47r_3",
                ]
            ],
            "FC_CACHE_TIME" => 500,
            "FC_CACHE_DIR" => "cache/",
        ]);

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
