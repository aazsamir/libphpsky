<?php

declare(strict_types=1);

namespace Tests\Unit\Client\Session;

use Aazsamir\Libphpsky\Client\AuthConfig;
use Aazsamir\Libphpsky\Client\Session\MemorySessionStore;
use Aazsamir\Libphpsky\Client\Session\Session;
use Tests\Unit\TestCase;

/**
 * @internal
 */
final class MemorySessionStoreTest extends TestCase
{
    public function testStore(): void
    {
        $store = new MemorySessionStore();
        $config = new AuthConfig('login', 'password');
        $session = new Session('access', 'refresh');
        $otherConfig = new AuthConfig('login2', 'password2');

        $store->store($config, $session);

        self::assertEquals($session, $store->retrieve($config));
        self::assertNull($store->retrieve($otherConfig));
    }
}
