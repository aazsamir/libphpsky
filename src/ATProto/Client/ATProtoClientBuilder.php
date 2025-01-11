<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Client;

use Aazsamir\Libphpsky\ATProto\Client\Session\DecoratedSessionStore;
use Aazsamir\Libphpsky\ATProto\Client\Session\MemorySessionStore;
use Aazsamir\Libphpsky\ATProto\Client\Session\PsrCacheSessionStore;
use Aazsamir\Libphpsky\ATProto\Client\Session\SessionStore;
use GuzzleHttp\Client;
use Psr\Cache\CacheItemPoolInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class ATProtoClientBuilder
{
    private AuthConfig $authConfig;
    private SessionStore $sessionStore;
    private static ATProtoClientInterface $default;
    private CacheItemPoolInterface $cache;
    private bool $useQueryCache = true;

    public static function getDefault(): ATProtoClientInterface
    {
        if (!isset(self::$default)) {
            self::$default = self::default()->build();
        }

        return self::$default;
    }

    public static function default(): self
    {
        $self = new self();
        $self->authConfig($self->defaultAuthConfig());
        $self->cache($self->defaultCache());
        $self->sessionStore($self->defaultSessionStore());

        return $self;
    }

    public function defaultAuthConfig(): AuthConfig
    {
        $login = $_ENV['ATPROTO_LOGIN'] ?? null;
        $password = $_ENV['ATPROTO_PASSWORD'] ?? null;

        if ($login !== null && !\is_string($login)) {
            throw new \RuntimeException('ATPROTO_LOGIN must be a string');
        }

        if ($password !== null && !\is_string($password)) {
            throw new \RuntimeException('ATPROTO_PASSWORD must be a string');
        }

        $authConfig = new AuthConfig(
            login: $login,
            password: $password,
        );

        return $authConfig;
    }

    public function defaultSessionStore(): SessionStore
    {
        return new DecoratedSessionStore(
            decorated: new MemorySessionStore(),
            actual: new PsrCacheSessionStore(
                cache: $this->cache,
            ),
        );
    }

    public function defaultCache(): CacheItemPoolInterface
    {
        return new FilesystemAdapter();
    }

    public function authConfig(AuthConfig $authConfig): self
    {
        $this->authConfig = $authConfig;

        return $this;
    }

    public function sessionStore(SessionStore $sessionStore): self
    {
        $this->sessionStore = $sessionStore;

        return $this;
    }

    public function cache(CacheItemPoolInterface $cache): self
    {
        $this->cache = $cache;

        return $this;
    }

    public function useQueryCache(bool $useQueryCache): self
    {
        $this->useQueryCache = $useQueryCache;

        return $this;
    }

    public function build(): ATProtoClientInterface
    {
        $client = new ATProtoClient(
            new Client(),
        );

        if ($this->useQueryCache) {
            $client = new QueryCacheClient(
                decorated: $client,
                cache: $this->cache,
            );
        }

        return new AuthAwareClient(
            decorated: new ErrorAwareClient(
                decorated: $client,
            ),
            authConfig: $this->authConfig,
            sessionStore: $this->sessionStore,
        );
    }
}
