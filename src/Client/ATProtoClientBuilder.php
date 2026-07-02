<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Client;

use Aazsamir\Libphpsky\Client\OAuth\EnvHandleProvider;
use Aazsamir\Libphpsky\Client\OAuth\HandleProvider;
use Aazsamir\Libphpsky\Client\Session\DecoratedSessionStore;
use Aazsamir\Libphpsky\Client\Session\MemorySessionStore;
use Aazsamir\Libphpsky\Client\Session\PsrCacheSessionStore;
use Aazsamir\Libphpsky\Client\Session\SessionStore;
use Aazsamir\Libphpsky\OAuth\ATProtoOAuthClientBuilder;
use Aazsamir\Libphpsky\OAuth\ClientMetadata;
use Amp\Http\Client\HttpClient;
use Amp\Http\Client\HttpClientBuilder;
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
    private bool $useAsync = false;
    private HttpClient $amphpClient;
    private int $cacheTtl = 3600;
    private bool $useOAuth = false;
    private HandleProvider $oauthHandleProvider;
    private ClientMetadata $oauthClientMetadata;

    public static function getDefault(): ATProtoClientInterface
    {
        if (!isset(self::$default)) {
            self::$default = self::default()->build();
        }

        return self::$default;
    }

    public static function setDefault(ATProtoClientInterface $default): void
    {
        self::$default = $default;
    }

    public static function default(): self
    {
        $self = new self();
        $self->authConfig($self->defaultAuthConfig());
        $self->cache($self->defaultCache());
        $self->sessionStore($self->defaultSessionStore());
        $self->oauthHandleProvider($self->defaultOAuthHandleProvider());

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
        if (!isset($this->cache)) {
            $this->cache($this->defaultCache());
        }

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

    public function defaultAmphpClient(): HttpClient
    {
        return HttpClientBuilder::buildDefault();
    }

    public function defaultOAuthHandleProvider(): HandleProvider
    {
        return new EnvHandleProvider();
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

    public function useAsync(bool $useAsync): self
    {
        $this->useAsync = $useAsync;

        return $this;
    }

    public function useOAuth(bool $useOAuth): self
    {
        $this->useOAuth = $useOAuth;

        return $this;
    }

    public function oauthHandleProvider(HandleProvider $handleProvider): self
    {
        $this->oauthHandleProvider = $handleProvider;

        return $this;
    }

    public function oauthClientMetadata(ClientMetadata $clientMetadata): self
    {
        $this->oauthClientMetadata = $clientMetadata;

        return $this;
    }

    public function amphpClient(HttpClient $amphpClient): self
    {
        $this->amphpClient = $amphpClient;
        $this->useAsync(true);

        return $this;
    }

    public function cacheTtl(int $cacheTtl): self
    {
        $this->cacheTtl = $cacheTtl;

        return $this;
    }

    public function build(): ATProtoClientInterface
    {
        if ($this->useAsync === false) {
            $client = new ATProtoClient(
                new Client(),
            );
        } else {
            if (!isset($this->amphpClient)) {
                $this->amphpClient($this->defaultAmphpClient());
            }

            $client = new AmphpClientAdapter(
                $this->amphpClient,
            );
        }

        if ($this->useQueryCache) {
            $client = new QueryCacheClient(
                decorated: $client,
                cache: $this->cache,
                ttl: $this->cacheTtl,
            );
        }

        $client = new ErrorAwareClient(
            decorated: $client,
        );

        if ($this->useOAuth) {
            if (!isset($this->oauthHandleProvider)) {
                $this->oauthHandleProvider($this->defaultOAuthHandleProvider());
            }
            if (!isset($this->oauthClientMetadata)) {
                throw new ATProtoClientBuilderException('OAuth client metadata must be set when using OAuth. Use the oauthClientMetadata() method to set it.');
            }

            return new OAuthAwareClient(
                decorated: $client,
                oauthClient: ATProtoOAuthClientBuilder::default()
                    ->client($client)
                    ->metadata($this->oauthClientMetadata)
                    ->build(),
                handleProvider: $this->oauthHandleProvider,
            );
        }

        return new AuthAwareClient(
            decorated: $client,
            authConfig: $this->authConfig,
            sessionStore: $this->sessionStore,
        );
    }
}
