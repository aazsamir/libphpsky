<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\OAuth;

use Firebase\JWT\JWT;

final readonly class Crypto
{
    private const string ALG = 'ES256';

    public static function generateEcP256Key(): CryptoKey
    {
        $privateKey = openssl_pkey_new([
            'private_key_type' => \OPENSSL_KEYTYPE_EC,
            'curve_name' => 'prime256v1',
        ]);

        if ($privateKey === false) {
            throw new CryptoException('Failed to generate EC P-256 key.');
        }

        return new CryptoKey($privateKey);
    }

    public static function randomString(int $length = 32): string
    {
        \assert($length > 0);

        return self::base64UrlEncode(random_bytes($length));
    }

    public static function s256CodeChallenge(string $codeVerifier): string
    {
        $hash = hash('sha256', $codeVerifier, true);

        return self::base64UrlEncode($hash);
    }

    public static function base64UrlEncode(string $data): string
    {
        return rtrim(
            strtr(
                base64_encode($data),
                '+/',
                '-_'
            ),
            '='
        );
    }

    public static function clientAssertionJwt(
        string $clientId,
        string $authServerUrl,
        CryptoKey $clientSecretJwk,
        int $expiration = 60,
    ): string {
        $now = time();

        $payload = [
            'iss' => $clientId,
            'sub' => $clientId,
            'aud' => $authServerUrl,
            'jti' => self::randomString(32),
            'iat' => $now,
            'exp' => $now + $expiration,
        ];

        $header = [
            'alg' => self::ALG,
            'kid' => $clientSecretJwk->keyId,
        ];

        return JWT::encode(
            $payload,
            $clientSecretJwk->private(),
            self::ALG,
            $clientSecretJwk->keyId,
            $header, // @phpstan-ignore-line
        );
    }

    public static function authServerDpopJwt(
        string $method,
        string $url,
        ?string $nonce,
        CryptoKey $dpopPrivateJwk,
        int $expiration = 30,
    ): string {
        $now = time();

        $payload = [
            'jti' => self::randomString(32),
            'htm' => strtoupper($method),
            'htu' => $url,
            'iat' => $now,
            'exp' => $now + $expiration,
            'nonce' => $nonce ?: '',
        ];

        $header = [
            'alg' => self::ALG,
            'typ' => 'dpop+jwt',
            'jwk' => $dpopPrivateJwk->publicJwk(),
        ];

        return JWT::encode(
            $payload,
            $dpopPrivateJwk->private(),
            self::ALG,
            null,
            $header, // @phpstan-ignore-line
        );
    }

    public static function pdsDpopJwt(
        string $method,
        string $url,
        string $access_token,
        ?string $nonce,
        CryptoKey $dpopPrivateJwk,
        int $expiration = 30,
    ): string {
        $now = time();

        $payload = [
            'iat' => $now,
            'exp' => $now + $expiration,
            'jti' => self::randomString(32),
            'htm' => strtoupper($method),
            'htu' => $url,
            'ath' => self::s256CodeChallenge($access_token),
            'nonce' => $nonce ?: '',
        ];

        $header = [
            'alg' => self::ALG,
            'typ' => 'dpop+jwt',
            'jwk' => $dpopPrivateJwk->publicJwk(),
        ];

        return JWT::encode(
            $payload,
            $dpopPrivateJwk->private(),
            self::ALG,
            null,
            $header, // @phpstan-ignore-line
        );
    }
}
