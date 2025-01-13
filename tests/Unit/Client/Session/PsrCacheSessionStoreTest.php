<?php

declare(strict_types=1);

namespace Tests\Unit\Client\Session;

use Aazsamir\Libphpsky\ATProto\Client\AuthConfig;
use Aazsamir\Libphpsky\ATProto\Client\Session\PsrCacheSessionStore;
use Aazsamir\Libphpsky\ATProto\Client\Session\Session;
use Tests\Unit\Client\Stub\CachePoolStub;
use Tests\Unit\TestCase;

/**
 * @internal
 */
final class PsrCacheSessionStoreTest extends TestCase
{
    private CachePoolStub $cache;
    private PsrCacheSessionStore $store;
    private AuthConfig $config;
    private Session $session;

    protected function setUp(): void
    {
        $this->cache = new CachePoolStub();
        $this->store = new PsrCacheSessionStore($this->cache);
        $this->config = new AuthConfig('login', 'password');
        $this->session = new Session('access', 'refresh');
    }

    public function testStore(): void
    {
        $this->store->store($this->config, $this->session);

        self::assertEquals($this->session, $this->store->retrieve($this->config));
        self::assertCount(1, $this->cache->cache);
    }

    public function testRetrieveNull(): void
    {
        self::assertNull($this->store->retrieve($this->config));
    }

    public function testInvalidItem(): void
    {
        $this->store->store($this->config, $this->session);

        $item = reset($this->cache->cache);
        $item->value = [];

        self::assertNull($this->store->retrieve($this->config));
    }
}
