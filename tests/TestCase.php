<?php
/**
 * Created by Andrey Stepanenko.
 * User: webnitros
 * Date: 24.03.2021
 * Time: 22:49
 */

namespace Fc\Tests;


use Mockery\Adapter\Phpunit\MockeryTestCase;

abstract class TestCase extends MockeryTestCase
{
    protected function setUp(): void
    {
		define('FC_REST_URL', "https://rest.massive.ru/");
		define('FC_REST_TOKEN', "VXDTB9lg4Uz4vkKsASAx2");
		require_once dirname(__DIR__, 1) . '/vendor/autoload.php';
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
