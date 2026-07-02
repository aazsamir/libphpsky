<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\OAuth\Session;

readonly class OAuthSession
{
    public function __construct(
        public string $accessToken,
        public string $refreshToken,
        public string $tokenType,
        public string $scope,
        public int $expiresIn,
        public string $did,
        public string $dpopNonce,
        public string $handle,
        public string $issuer,
        public string $dpopPrivateKey,
    ) {}

    /**
     * @param array<mixed, mixed> $data
     */
    public static function fromJson(array $data): self
    {
        \assert(\is_string($data['accessToken']));
        \assert(\is_string($data['refreshToken']));
        \assert(\is_string($data['tokenType']));
        \assert(\is_string($data['scope']));
        \assert(\is_int($data['expiresIn']));
        \assert(\is_string($data['did']));
        \assert(\is_string($data['dpopNonce']));
        \assert(\is_string($data['handle']));
        \assert(\is_string($data['issuer']));
        \assert(\is_string($data['dpopPrivateKey']));

        return new self(
            $data['accessToken'],
            $data['refreshToken'],
            $data['tokenType'],
            $data['scope'],
            $data['expiresIn'],
            $data['did'],
            $data['dpopNonce'],
            $data['handle'],
            $data['issuer'],
            $data['dpopPrivateKey'],
        );
    }

    public function withDpopNonce(string $dpopNonce): self
    {
        return new self(
            accessToken: $this->accessToken,
            refreshToken: $this->refreshToken,
            tokenType: $this->tokenType,
            scope: $this->scope,
            expiresIn: $this->expiresIn,
            did: $this->did,
            dpopNonce: $dpopNonce,
            handle: $this->handle,
            issuer: $this->issuer,
            dpopPrivateKey: $this->dpopPrivateKey,
        );
    }
}
