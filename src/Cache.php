<?php

namespace Fc;

use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Fc\Exceptions\CacheException;
use Fc\Config;

class Cache
{
    public $cache;

    public function __construct($time = 0)
    {
        $config = Config::getInstance()->get();
        if (empty($config["FC_CACHE_TIME"])) throw new CacheException("Добавте время кеша.");
        if ($time === 0) {
            $time = $config["FC_CACHE_TIME"];
        }
        if (empty($config["FC_CACHE_DIR"])) throw new CacheException("Добавте полный путь для директории кеша.");
        $this->cache = new FilesystemAdapter('fc', $time, $config["FC_CACHE_DIR"]);
    }

    public function set($key, $content)
    {
        $cacheItem = $this->cache->getItem($key);
        $cacheItem->set(json_encode($content));
        $this->cache->save($cacheItem);
    }

    public function get($key)
    {
        $cacheItem = $this->cache->getItem($key);
        return $cacheItem->get();
    }

    public function delete($key)
    {
        $this->cache->deleteItem($key);
    }

    public function isCache($key)
    {
        $cacheItem = $this->cache->getItem($key);
        if ($cacheItem->isHit()) {
            return true;
        }
        return false;
    }

    public function prune()
    {
        $this->cache->prune();
    }
}
