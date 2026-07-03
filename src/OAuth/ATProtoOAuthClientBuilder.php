<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\OAuth;

use Aazsamir\Libphpsky\Client\ATProtoClientBuilder;
use Aazsamir\Libphpsky\Client\ATProtoClientInterface;
use Aazsamir\Libphpsky\Client\Facade\ATProtoFacade;
use Aazsamir\Libphpsky\OAuth\Session\PsrCacheSessionManager;
use Aazsamir\Libphpsky\OAuth\Session\SessionManager;
use Psr\Cache\CacheItemPoolInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class ATProtoOAuthClientBuilder
{
    private ATProtoFacade $facade;
    private SessionManager $sessionManager;
    private ATProtoClientInterface $client;
    private ClientMetadata $metadata;
    private CryptoKey $key;
    private CacheItemPoolInterface $cache;
    private int $initSessionTtl = 60 * 10; // 10 minutes
    private int $sessionTtl = 60 * 60 * 24 * 2; // 2 days

    public static function default(): self
    {
        return new self();
    }

    public static function defaultKey(): CryptoKey
    {
        // create key in cwd, read it if exists, otherwise generate a new one
        $keyFile = getcwd() . \DIRECTORY_SEPARATOR . 'libphpsky_oauth_key.pem';

        if (file_exists($keyFile)) {
            $keyString = file_get_contents($keyFile);

            if ($keyString === false) {
                throw new OAuthException('Failed to read the key file.');
            }

            $data = json_decode($keyString, true);

            if (!\is_array($data)) {
                throw new OAuthException('Invalid key file format.');
            }

            return CryptoKey::fromJson($data);
        }

        $key = Crypto::generateEcP256Key()->withKeyId(Crypto::randomString(16));

        if (file_put_contents($keyFile, json_encode($key)) === false) {
            throw new OAuthException('Failed to write the key file.');
        }

        return $key;
    }

    public function facade(ATProtoFacade $facade): self
    {
        $this->facade = $facade;

        return $this;
    }

    public function sessionManager(SessionManager $sessionManager): self
    {
        $this->sessionManager = $sessionManager;

        return $this;
    }

    public function client(ATProtoClientInterface $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function metadata(ClientMetadata $metadata): self
    {
        $this->metadata = $metadata;

        return $this;
    }

    public function key(CryptoKey $key): self
    {
        $this->key = $key;

        return $this;
    }

    public function cache(CacheItemPoolInterface $cache): self
    {
        $this->cache = $cache;

        return $this;
    }

    public function initSessionTtl(int $ttl): self
    {
        $this->initSessionTtl = $ttl;

        return $this;
    }

    public function sessionTtl(int $ttl): self
    {
        $this->sessionTtl = $ttl;

        return $this;
    }

    public function getSessionTtl(): int
    {
        return $this->sessionTtl;
    }

    public function build(): ATProtoOAuthClient
    {
        if (!isset($this->metadata)) {
            throw new MissingClientMetadata('OAuth client metadata must be set when using OAuth. Use the metadata() method to set it.');
        }

        if (!isset($this->client)) {
            $this->client = ATProtoClientBuilder::getDefault();
        }

        if (!isset($this->sessionManager)) {
            if (!isset($this->cache)) {
                $this->cache = new FilesystemAdapter();
            }

            $this->sessionManager = new PsrCacheSessionManager(
                cache: $this->cache,
                initTtl: $this->initSessionTtl,
                sessionTtl: $this->sessionTtl,
            );
        }

        if (!isset($this->facade)) {
            $this->facade = ATProtoFacade::default($this->client);
        }

        if (!isset($this->key)) {
            $this->key = self::defaultKey();
        }

        return new ATProtoOAuthClient(
            facade: $this->facade,
            sessionManager: $this->sessionManager,
            client: $this->client,
            metadata: $this->metadata,
            key: $this->key,
            initSessionTtl: $this->initSessionTtl,
            sessionTtl: $this->sessionTtl,
        );
    }
}
