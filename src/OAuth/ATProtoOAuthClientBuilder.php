<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\OAuth;

use Aazsamir\Libphpsky\Client\ATProtoClientBuilder;
use Aazsamir\Libphpsky\Client\ATProtoClientInterface;
use Aazsamir\Libphpsky\Client\Facade\ATProtoFacade;
use Aazsamir\Libphpsky\OAuth\Session\PsrCacheSessionManager;
use Aazsamir\Libphpsky\OAuth\Session\SessionManager;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class ATProtoOAuthClientBuilder
{
    private ATProtoFacade $facade;
    private SessionManager $sessionManager;
    private ATProtoClientInterface $client;
    private ClientMetadata $metadata;
    private CryptoKey $key;

    public static function default(): self
    {
        $self = new self();
        $self->client = ATProtoClientBuilder::getDefault();
        $self->facade = ATProtoFacade::default();
        $self->sessionManager = new PsrCacheSessionManager(
            new FilesystemAdapter()
        );
        $self->key = self::defaultKey();

        return $self;
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

    public function build(): ATProtoOAuthClient
    {
        if (!isset($this->facade)) {
            $this->facade = ATProtoFacade::default($this->client);
        }

        return new ATProtoOAuthClient(
            facade: $this->facade,
            sessionManager: $this->sessionManager,
            client: $this->client,
            metadata: $this->metadata,
            key: $this->key,
        );
    }
}
