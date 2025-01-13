<?php

declare(strict_types=1);

namespace Tests\Unit\Client\Session;

use Aazsamir\Libphpsky\ATProto\Client\AuthConfig;
use Aazsamir\Libphpsky\ATProto\Client\Session\DecoratedSessionStore;
use Aazsamir\Libphpsky\ATProto\Client\Session\MemorySessionStore;
use Aazsamir\Libphpsky\ATProto\Client\Session\NoopSessionStore;
use Aazsamir\Libphpsky\ATProto\Client\Session\Session;
use Tests\Unit\TestCase;

/**
 * @internal
 */
final class DecoratedSessionStoreTest extends TestCase
{
    public function testGetFromActual(): void
    {
        $actual = new MemorySessionStore();
        $decorated = new NoopSessionStore();
        $config = new AuthConfig('login', 'password');
        $session = new Session('access', 'refresh');
        $actual->store($config, $session);

        $store = new DecoratedSessionStore($decorated, $actual);

        self::assertEquals($session, $store->retrieve($config));
    }

    public function testGetFromDecorated(): void
    {
        $actual = new NoopSessionStore();
        $decorated = new MemorySessionStore();
        $config = new AuthConfig('login', 'password');
        $session = new Session('access', 'refresh');
        $decorated->store($config, $session);

        $store = new DecoratedSessionStore($decorated, $actual);

        self::assertEquals($session, $store->retrieve($config));
    }

    public function testStore(): void
    {
        $actual = new MemorySessionStore();
        $decorated = new MemorySessionStore();
        $config = new AuthConfig('login', 'password');
        $session = new Session('access', 'refresh');

        $store = new DecoratedSessionStore($decorated, $actual);
        $store->store($config, $session);

        self::assertEquals($session, $actual->retrieve($config));
        self::assertEquals($session, $decorated->retrieve($config));
    }

    public function testNull(): void
    {
        $actual = new NoopSessionStore();
        $decorated = new NoopSessionStore();
        $config = new AuthConfig('login', 'password');

        $store = new DecoratedSessionStore($decorated, $actual);

        self::assertNull($store->retrieve($config));
    }
}
