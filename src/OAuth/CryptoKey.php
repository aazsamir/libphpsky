<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\OAuth;

readonly class CryptoKey implements \JsonSerializable
{
    public function __construct(
        public \OpenSSLAsymmetricKey $key,
        public ?string $keyId = null,
    ) {}

    public static function fromString(string $key, ?string $keyId = null): self
    {
        $key = openssl_pkey_get_private($key);

        if ($key === false) {
            throw new CryptoException('Invalid private key string.');
        }

        return new self(
            $key,
            $keyId
        );
    }

    /**
     * @param array<mixed, mixed> $data
     */
    public static function fromJson(array $data): self
    {
        if (!isset($data['key'])) {
            throw new CryptoException('Invalid JWT key data.');
        }

        $key = $data['key'];
        $keyId = $data['keyId'] ?? null;

        \assert(\is_string($key));
        \assert($keyId === null || \is_string($keyId));

        return self::fromString($key, $keyId);
    }

    public function withKeyId(string $keyId): self
    {
        return new self(
            $this->key,
            $keyId
        );
    }

    public function private(): string
    {
        openssl_pkey_export($this->key, $privateKeyPem);

        \assert(\is_string($privateKeyPem));

        return $privateKeyPem;
    }

    public function public(): string
    {
        $details = openssl_pkey_get_details($this->key);

        if ($details === false) {
            throw new CryptoException('Failed to get public key details.');
        }

        \assert(\is_string($details['key']));

        return $details['key'];
    }

    /**
     * @return array<string, mixed>
     */
    public function publicJwk(): array
    {
        $details = openssl_pkey_get_details($this->key);

        if (!isset($details['type']) || $details['type'] !== \OPENSSL_KEYTYPE_EC || !isset($details['ec'])) {
            throw new CryptoException('Expected an EC public key.');
        }

        $ecDetails = $details['ec'];

        \assert(\is_array($ecDetails));
        \assert(\is_string($ecDetails['x']));
        \assert(\is_string($ecDetails['y']));

        return [
            'kty' => 'EC',
            'crv' => 'P-256',
            'x' => Crypto::base64UrlEncode($ecDetails['x']),
            'y' => Crypto::base64UrlEncode($ecDetails['y']),
        ];
    }

    public function jsonSerialize(): mixed
    {
        return [
            'key' => $this->private(),
            'keyId' => $this->keyId,
        ];
    }
}
