<?php

declare(strict_types=1);

namespace Tests\Stub;

use Aazsamir\Libphpsky\OAuth\ATProtoOAuthClient;
use Aazsamir\Libphpsky\OAuth\ClientMetadata;
use Aazsamir\Libphpsky\OAuth\Crypto;
use Aazsamir\Libphpsky\OAuth\Session\OAuthSession;
use Aazsamir\Libphpsky\OAuth\Session\OAuthSessionInit;
use Psr\Http\Message\ResponseInterface;

/**
 * @internal
 */
class ATProtoOAuthClientStub implements ATProtoOAuthClient
{
    public array $sessions = [];

    public function metadata(): ClientMetadata
    {
        $redirectUri = 'http://127.0.0.1:8000/oauth/callback';
        $scope = 'atproto transition:generic';

        return new ClientMetadata(
            clientId: 'http://localhost?' . http_build_query([
                'redirect_uri' => $redirectUri,
                'scope' => $scope,
            ]),
            clientName: 'Libphpsky Oauth Example',
            redirectUris: [$redirectUri],
            tokenEndpointAuthMethod: 'none',
            scope: $scope,
        );
    }

    public function initiateSession(string $handle): OAuthSessionInit
    {
        return new OAuthSessionInit(
            state: 'state',
            issuer: 'https://bsky.social',
            authorizationEndpoint: 'https://bsky.social/oauth/authorize',
            clientId: $this->metadata()->clientId,
            requestUri: 'https://bsky.social/oauth/authorize?' . http_build_query([
                'client_id' => $this->metadata()->clientId,
                'redirect_uri' => $this->metadata()->redirectUris[0],
            ]),
            did: 'did:plc:1234567890abcdef',
            handle: $handle,
            codeVerifier: 'code_verifier',
            scope: $this->metadata()->scope,
            dpopNonce: 'dpop_nonce',
            dpopPrivateKey: Crypto::generateEcP256Key()->private(),
        );
    }

    public function handleCallback(string $state, string $iss, string $code): OAuthSession
    {
        return new OAuthSession(
            accessToken: 'access_token',
            refreshToken: 'refresh_token',
            tokenType: 'DPoP',
            scope: $this->metadata()->scope,
            expiresIn: 3600,
            did: 'did:plc:1234567890abcdef',
            dpopNonce: 'dpop_nonce',
            handle: 'test.bsky.social',
            issuer: 'https://bsky.social',
            dpopPrivateKey: Crypto::generateEcP256Key()->private()
        );
    }

    public function refreshToken(OAuthSession $session): OAuthSession
    {
        return $session;
    }

    public function getSessionByHandle(string $handle): ?OAuthSession
    {
        return $this->sessions[$handle] ?? null;
    }

    public function getAuthHeaders(OAuthSession $session, string $method, string $url, ?string $dpopNonce = null, int $expiration = 30): array
    {
        return [
            'Authorization' => 'DPoP ' . $session->accessToken,
            'DPoP' => 'dpop_jwt',
        ];
    }

    public function updateDpopNonce(OAuthSession $session, string $dpopNonce): OAuthSession
    {
        return $session->withDpopNonce($dpopNonce);
    }

    public function removeSession(OAuthSession $session): void
    {
        unset($this->sessions[$session->handle]);
    }

    public function extractDpopNonce(ResponseInterface $response): ?string
    {
        return $response->getHeaderLine('DPoP-Nonce') ?: 'smth';
    }
}
