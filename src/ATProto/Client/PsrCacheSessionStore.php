<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Client;

use Psr\Cache\CacheItemPoolInterface;

class PsrCacheSessionStore implements SessionStore
{
    public function __construct(
        private CacheItemPoolInterface $cache,
        private string $prefix = 'atproto_session_',
        private int $ttl = 600,
    ) {}

    public function store(AuthConfig $authConfig, Session $session): void
    {
        $cacheItem = $this->cache->getItem($this->key($authConfig));
        $cacheItem->expiresAfter($this->ttl);
        $cacheItem->set([
            'access' => $session->getAccessToken(),
            'refresh' => $session->getRefreshToken(),
        ]);
        $this->cache->save($cacheItem);
    }

    public function retrieve(AuthConfig $authConfig): ?Session {
        $cacheItem = $this->cache->getItem($this->key($authConfig));

        if (!$cacheItem->isHit()) {
            return null;
        }

        $data = $cacheItem->get();

        return new Session($data['access'], $data['refresh']);
    }

    private function key(AuthConfig $authConfig): string
    {
        return $this->prefix . $authConfig->login() . '@' . $authConfig->password();
    }
}