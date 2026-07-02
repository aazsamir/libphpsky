<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\OAuth\Session;

use Aazsamir\Libphpsky\OAuth\CryptoKey;

readonly class OAuthSessionInit
{
    public function __construct(
        public string $state,
        public string $issuer,
        public string $authorizationEndpoint,
        public string $clientId,
        public string $requestUri,
        public string $did,
        public string $handle,
        public string $codeVerifier,
        public string $scope,
        public string $dpopNonce,
        public string $dpopPrivateKey,
    ) {}

    /**
     * @param array<mixed, mixed> $data
     */
    public static function fromJson(array $data): self
    {
        \assert(\is_string($data['state']));
        \assert(\is_string($data['issuer']));
        \assert(\is_string($data['authorizationEndpoint']));
        \assert(\is_string($data['clientId']));
        \assert(\is_string($data['requestUri']));
        \assert(\is_string($data['did']));
        \assert(\is_string($data['handle']));
        \assert(\is_string($data['codeVerifier']));
        \assert(\is_string($data['scope']));
        \assert(\is_string($data['dpopNonce']));
        \assert(\is_string($data['dpopPrivateKey']));

        return new self(
            $data['state'],
            $data['issuer'],
            $data['authorizationEndpoint'],
            $data['clientId'],
            $data['requestUri'],
            $data['did'],
            $data['handle'],
            $data['codeVerifier'],
            $data['scope'],
            $data['dpopNonce'],
            $data['dpopPrivateKey'],
        );
    }

    public function redirectUrl(): string
    {
        return $this->authorizationEndpoint . '?' . http_build_query([
            'client_id' => $this->clientId,
            'request_uri' => $this->requestUri,
        ]);
    }

    public function dpopPrivateKey(): CryptoKey
    {
        return CryptoKey::fromString($this->dpopPrivateKey);
    }
}
