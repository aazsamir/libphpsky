<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\OAuth\Session;

use Psr\Cache\CacheItemPoolInterface;

readonly class PsrCacheSessionManager implements SessionManager
{
    public function __construct(
        private CacheItemPoolInterface $cache,
        private string $prefix = 'atproto_oauth_',
        private int $initTtl = 600,
        private int $sessionTtl = 3600,
    ) {}

    public function saveSessionInit(OAuthSessionInit $sessionInit): void
    {
        $key = $this->initKey($sessionInit->state);
        $cacheItem = $this->cache->getItem($key);
        $cacheItem->expiresAfter($this->initTtl);
        $cacheItem->set(json_encode($sessionInit));
        $this->cache->save($cacheItem);
    }

    public function saveSession(OAuthSession $session): void
    {
        $key = $this->sessionKey($session->handle);
        $cacheItem = $this->cache->getItem($key);
        $cacheItem->expiresAfter($this->sessionTtl);
        $cacheItem->set(json_encode($session));
        $this->cache->save($cacheItem);
    }

    public function getSessionInitByState(string $state): ?OAuthSessionInit
    {
        $key = $this->initKey($state);
        $cacheItem = $this->cache->getItem($key);

        if (!$cacheItem->isHit()) {
            return null;
        }

        $cached = $cacheItem->get();

        if (!\is_string($cached)) {
            return null;
        }

        $data = json_decode($cached, true);

        if (!\is_array($data)) {
            return null;
        }

        return OAuthSessionInit::fromJson($data);
    }

    public function getSessionByHandle(string $handle): ?OAuthSession
    {
        $key = $this->sessionKey($handle);
        $cacheItem = $this->cache->getItem($key);

        if (!$cacheItem->isHit()) {
            return null;
        }

        $cached = $cacheItem->get();

        if (!\is_string($cached)) {
            return null;
        }

        $data = json_decode($cached, true);

        if (!\is_array($data)) {
            return null;
        }

        return OAuthSession::fromJson($data);
    }

    public function removeSession(OAuthSession $session): void
    {
        $key = $this->sessionKey($session->handle);
        $this->cache->deleteItem($key);
    }

    private function initKey(string $state): string
    {
        return md5($this->prefix . 'init_' . $state);
    }

    private function sessionKey(string $handle): string
    {
        return md5($this->prefix . 'session_' . $handle);
    }
}
