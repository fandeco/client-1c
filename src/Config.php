<?php

namespace Fc;

class Config
{
    private static $instances = null;

    public static $config = [
        "FC_REST_URL" => "",
        "FC_REST_TOKEN" => "",
    ];

    protected function __construct($config)
    {
        self::$config = array_merge($config, self::$config);
    }

    protected function __clone()
    {
    }

    public function __wakeup()
    {
    }

    public static function getInstance($config = []): Config
    {
        if (is_null(self::$instances)) {
            self::$instances = new static($config);
        }
        return self::$instances;
    }

    public function get()
    {
        return self::$config;
    }
}
