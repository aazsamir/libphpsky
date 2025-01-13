<?php

declare(strict_types=1);

namespace Tests\Unit\Client\Stub;

use Psr\Cache\CacheItemInterface;
use Psr\Cache\CacheItemPoolInterface;

class CachePoolStub implements CacheItemPoolInterface
{
    /** @var CacheItemStub[] */
    public array $cache = [];

    public function getItem(string $key): CacheItemInterface
    {
        return $this->cache[$key] ?? new CacheItemStub($key);
    }

    public function getItems(array $keys = []): iterable
    {
        foreach ($keys as $key) {
            yield $this->getItem($key);
        }
    }

    public function hasItem(string $key): bool
    {
        return isset($this->cache[$key]);
    }

    public function clear(): bool
    {
        $this->cache = [];

        return true;
    }

    public function deleteItem(string $key): bool
    {
        unset($this->cache[$key]);

        return true;
    }

    public function deleteItems(array $keys): bool
    {
        foreach ($keys as $key) {
            unset($this->cache[$key]);
        }

        return true;
    }

    /** @param CacheItemStub $item */
    public function save(CacheItemInterface $item): bool
    {
        $item->hit = true;
        $this->cache[$item->getKey()] = $item;

        return true;
    }

    public function saveDeferred(CacheItemInterface $item): bool
    {
        $this->cache[$item->getKey()] = $item;

        return true;
    }

    public function commit(): bool
    {
        return true;
    }
}
