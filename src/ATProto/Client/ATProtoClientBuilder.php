<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Client;

use Aazsamir\Libphpsky\ATProto\Client\Session\DecoratedSessionStore;
use Aazsamir\Libphpsky\ATProto\Client\Session\MemorySessionStore;
use Aazsamir\Libphpsky\ATProto\Client\Session\PsrCacheSessionStore;
use Aazsamir\Libphpsky\ATProto\Client\Session\SessionStore;
use GuzzleHttp\Client;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class ATProtoClientBuilder
{
    private AuthConfig $authConfig;
    private SessionStore $sessionStore;
    private static ATProtoClientInterface $default;

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
        $self->sessionStore($self->defaultSessionStore());

        return $self;
    }

    public function defaultAuthConfig(): AuthConfig
    {
        $login = isset($_ENV['ATPROTO_LOGIN']) ? $_ENV['ATPROTO_LOGIN'] : null;
        $password = isset($_ENV['ATPROTO_PASSWORD']) ? $_ENV['ATPROTO_PASSWORD'] : null;
        $authConfig = new AuthConfig(
            login: $login,
            password: $password,
        );

        return $authConfig;
    }

    public function defaultSessionStore(): SessionStore
    {
        $sessionStore = new DecoratedSessionStore(
            decorated: new MemorySessionStore(),
            actual: new PsrCacheSessionStore(
                cache: new FilesystemAdapter(),
            ),
        );

        return $sessionStore;
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

    public function build(): ATProtoClientInterface
    {
        $client = new AuthAwareClient(
            decorated: new ErrorAwareClient(
                decorated: new Client(),
            ),
            authConfig: $this->authConfig,
            sessionStore: $this->sessionStore,
        );

        return $client;
    }
}