<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Client;

use Aazsamir\Libphpsky\Client\OAuth\EnvHandleProvider;
use Aazsamir\Libphpsky\Client\OAuth\HandleProvider;
use Aazsamir\Libphpsky\Client\Session\DecoratedSessionStore;
use Aazsamir\Libphpsky\Client\Session\MemorySessionStore;
use Aazsamir\Libphpsky\Client\Session\PsrCacheSessionStore;
use Aazsamir\Libphpsky\Client\Session\SessionStore;
use Aazsamir\Libphpsky\OAuth\ATProtoOAuthClient;
use Aazsamir\Libphpsky\OAuth\ATProtoOAuthClientBuilder;
use Aazsamir\Libphpsky\OAuth\ClientMetadata;
use Aazsamir\Libphpsky\OAuth\CryptoKey;
use Aazsamir\Libphpsky\OAuth\Session\SessionManager;
use Amp\Http\Client\HttpClient;
use Amp\Http\Client\HttpClientBuilder;
use GuzzleHttp\Client;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Http\Client\ClientInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class ATProtoClientBuilder
{
    private AuthConfig $authConfig;
    private SessionStore $sessionStore;
    private static ATProtoClientInterface $default;
    private CacheItemPoolInterface $cache;
    private bool $useQueryCache = true;
    private ClientInterface $psrClient;
    private bool $useAsync = false;
    private HttpClient $amphpClient;
    private int $cacheTtl = 3600;
    private bool $useOAuth = false;
    private HandleProvider $oauthHandleProvider;
    private ATProtoOAuthClientBuilder $oauthClientBuilder;
    private ATProtoOAuthClient $oauthClient;

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
        $self->oauthClientBuilder(ATProtoOAuthClientBuilder::default());
        $self->authConfig($self->defaultAuthConfig());
        $self->cache($self->defaultCache());
        $self->sessionStore($self->defaultSessionStore());
        $self->oauthHandleProvider($self->defaultOAuthHandleProvider());

        return $self;
    }

    public function defaultAuthConfig(): AuthConfig
    {
        $login = $_ENV['ATPROTO_LOGIN'] ?? getenv('ATPROTO_LOGIN') ?: null;
        $password = $_ENV['ATPROTO_PASSWORD'] ?? getenv('ATPROTO_PASSWORD') ?: null;

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
        $this->oauthClientBuilder->cache($cache);

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

    public function oauthClientBuilder(ATProtoOAuthClientBuilder $builder): self
    {
        $this->oauthClientBuilder = $builder;

        return $this;
    }

    public function getOAuthClientBuilder(): ATProtoOAuthClientBuilder
    {
        return $this->oauthClientBuilder;
    }

    private function psrClient(ClientInterface $psrClient): self
    {
        $this->psrClient = $psrClient;

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

    public function oauthSessionTtl(int $sessionTtl): self
    {
        $this->oauthClientBuilder->sessionTtl($sessionTtl);

        return $this;
    }

    public function oauthInitSessionTtl(int $initSessionTtl): self
    {
        $this->oauthClientBuilder->initSessionTtl($initSessionTtl);

        return $this;
    }

    public function oauthKey(CryptoKey $key): self
    {
        $this->oauthClientBuilder->key($key);

        return $this;
    }

    public function oauthMetadata(ClientMetadata $metadata): self
    {
        $this->oauthClientBuilder->metadata($metadata);

        return $this;
    }

    public function oauthSessionManager(SessionManager $sessionManager): self
    {
        $this->oauthClientBuilder->sessionManager($sessionManager);

        return $this;
    }

    public function getOAuthClient(): ATProtoOAuthClient
    {
        return $this->oauthClient;
    }

    public function build(): ATProtoClientInterface
    {
        if ($this->useAsync) {
            if (!isset($this->amphpClient)) {
                $this->amphpClient($this->defaultAmphpClient());
            }

            $client = new AmphpClientAdapter(
                $this->amphpClient,
            );
        } else {
            if (!isset($this->psrClient)) {
                $this->psrClient(new Client());
            }

            $client = new ATProtoClient(
                $this->psrClient,
            );
        }

        $client = new ErrorAwareClient(
            decorated: $client,
        );

        if ($this->useOAuth) {
            if (!isset($this->oauthHandleProvider)) {
                $this->oauthHandleProvider($this->defaultOAuthHandleProvider());
            }

            $this->oauthClient = $this->oauthClientBuilder->client($client)->build();

            $client = new OAuthAwareClient(
                decorated: $client,
                oauthClient: $this->oauthClient,
                handleProvider: $this->oauthHandleProvider,
                sessionTtl: $this->oauthClientBuilder->getSessionTtl(),
            );
        } else {
            $client = new AuthAwareClient(
                decorated: $client,
                authConfig: $this->authConfig,
                sessionStore: $this->sessionStore,
            );
        }

        if ($this->useQueryCache) {
            $client = new QueryCacheClient(
                decorated: $client,
                cache: $this->cache,
                ttl: $this->cacheTtl,
            );
        }

        return $client;
    }
}
