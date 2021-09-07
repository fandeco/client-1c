<?php
namespace Fc;

use Fc\Cache;

class CacheDelete
{
    private static $instances = null;


    protected function __construct() {
        $cache = new Cache();
        $cache->prune();
    }

    protected function __clone()
    {
    }

    public function __wakeup()
    {
    }

    public static function getInstance(): CacheDelete
    {
        if (is_null(self::$instances)) {
            self::$instances = new static();
        }
        return self::$instances;
    }
}
