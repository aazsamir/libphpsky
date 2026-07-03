<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\OAuth;

use Aazsamir\Libphpsky\Client\ATProtoClientInterface;
use Aazsamir\Libphpsky\Client\ATProtoException;
use Aazsamir\Libphpsky\Client\Facade\ATProtoFacade;
use Aazsamir\Libphpsky\Client\Facade\AuthServerMetadata;
use Aazsamir\Libphpsky\Model\Com\Atproto\Identity\ResolveHandle\ResolveHandle;
use Aazsamir\Libphpsky\OAuth\Session\OAuthSession;
use Aazsamir\Libphpsky\OAuth\Session\OAuthSessionInit;
use Aazsamir\Libphpsky\OAuth\Session\SessionManager;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;

readonly class ATProtoOAuthClient
{
    public function __construct(
        private ATProtoFacade $facade,
        private SessionManager $sessionManager,
        private ATProtoClientInterface $client,
        private ClientMetadata $metadata,
        private CryptoKey $key,
        private int $initSessionTtl = 600,
        private int $sessionTtl = 3600,
    ) {}

    public function metadata(): ClientMetadata
    {
        return $this->metadata;
    }

    public function initiateSession(string $handle): OAuthSessionInit
    {
        $did = ResolveHandle::default($this->client)->query($handle)->did;
        $authServerMetadata = $this->getAuthServerMetadataByDid($did);
        $dpopPrivateKey = Crypto::generateEcP256Key();

        $result = $this->requestParAuthServer(
            authServerMetadata: $authServerMetadata,
            clientSecretJwk: $this->key,
            dpopJwk: $dpopPrivateKey,
            loginHint: $handle,
        );
        /**
         * @var array{
         *   request_uri?: string,
         * }
         */
        $response = json_decode((string) $result->response->getBody(), true);
        // it's not really URI, it's just a token
        $requestUri = $response['request_uri'] ?? null;

        if ($requestUri === null) {
            throw new OAuthException('Missing request_uri in the auth server response.');
        }

        $initSession = new OAuthSessionInit(
            state: $result->state,
            issuer: $authServerMetadata->issuer,
            authorizationEndpoint: $authServerMetadata->authorizationEndpoint,
            clientId: $this->metadata->clientId,
            requestUri: $requestUri,
            did: $did,
            handle: $handle,
            codeVerifier: $result->codeVerifier,
            scope: $this->metadata->scope,
            dpopNonce: $this->extractDpopNonce($result->response) ?? '',
            dpopPrivateKey: $dpopPrivateKey->private(),
        );

        $this->sessionManager->saveSessionInit($initSession);

        return $initSession;
    }

    public function handleCallback(
        string $state,
        string $iss,
        string $code,
    ): OAuthSession {
        $sessionInit = $this->sessionManager->getSessionInitByState($state);

        if ($sessionInit === null) {
            throw new OAuthException('Session init not found for the given state.');
        }

        if ($sessionInit->issuer !== $iss) {
            throw new OAuthException('Issuer mismatch in the callback.');
        }

        $authServerMetadata = $this->getAuthServerMetadataByDid($sessionInit->did);

        $body = [
            'grant_type' => 'authorization_code',
            'code' => $code,
            'redirect_uri' => $this->redirectUri(),
            'code_verifier' => $sessionInit->codeVerifier,
        ];

        $response = $this->requestAuthServer(
            authServerMetadata: $authServerMetadata,
            clientSecretJwk: $this->key,
            dpopJwk: $sessionInit->dpopPrivateKey(),
            uri: $authServerMetadata->tokenEndpoint,
            dpopNonce: $sessionInit->dpopNonce,
            body: $body,
            expiration: $this->sessionTtl,
        );
        $dpopNonce = $this->extractDpopNonce($response);

        /**
         * @var array{
         *   access_token: string,
         *   token_type: string,
         *   refresh_token: string,
         *   scope: string,
         *   expires_in: int,
         *   sub: string,
         * }
         */
        $response = json_decode((string) $response->getBody(), true);
        [
            'access_token' => $resAccessToken,
            'token_type' => $resTokenType,
            'refresh_token' => $resRefreshToken,
            'scope' => $resScope,
            'expires_in' => $resExpiresIn,
            'sub' => $resSub,
        ] = $response;

        if ($resSub !== $sessionInit->did) {
            throw new OAuthException('Subject mismatch in the token response.');
        }

        $session = new OAuthSession(
            accessToken: $resAccessToken,
            refreshToken: $resRefreshToken,
            tokenType: $resTokenType,
            scope: $resScope,
            expiresIn: $resExpiresIn,
            did: $resSub,
            dpopNonce: $dpopNonce ?? '',
            handle: $sessionInit->handle,
            issuer: $sessionInit->issuer,
            dpopPrivateKey: $sessionInit->dpopPrivateKey,
        );

        $this->sessionManager->saveSession($session);

        return $session;
    }

    public function refreshToken(OAuthSession $session): OAuthSession
    {
        $authServerMetadata = $this->getAuthServerMetadataByDid($session->did);

        $body = [
            'grant_type' => 'refresh_token',
            'refresh_token' => $session->refreshToken,
        ];

        $response = $this->requestAuthServer(
            authServerMetadata: $authServerMetadata,
            clientSecretJwk: $this->key,
            dpopJwk: CryptoKey::fromString($session->dpopPrivateKey),
            uri: $authServerMetadata->tokenEndpoint,
            dpopNonce: $session->dpopNonce,
            body: $body,
            expiration: $this->sessionTtl,
        );
        $dpopNonce = $this->extractDpopNonce($response);
        /**
         * @var array{
         *   access_token: string,
         *   token_type: string,
         *   refresh_token: string,
         *   scope: string,
         *   expires_in: int,
         *   sub: string,
         * }
         */
        $response = json_decode((string) $response->getBody(), true);
        [
            'access_token' => $resAccessToken,
            'token_type' => $resTokenType,
            'refresh_token' => $resRefreshToken,
            'scope' => $resScope,
            'expires_in' => $resExpiresIn,
            'sub' => $resSub,
        ] = $response;

        if ($resSub !== $session->did) {
            throw new OAuthException('Subject mismatch in the token response.');
        }

        $newSession = new OAuthSession(
            accessToken: $resAccessToken,
            refreshToken: $resRefreshToken,
            tokenType: $resTokenType,
            scope: $resScope,
            expiresIn: $resExpiresIn,
            did: $resSub,
            dpopNonce: $dpopNonce ?? '',
            handle: $session->handle,
            issuer: $session->issuer,
            dpopPrivateKey: $session->dpopPrivateKey,
        );

        $this->sessionManager->saveSession($newSession);

        return $newSession;
    }

    public function getSessionByHandle(string $handle): ?OAuthSession
    {
        return $this->sessionManager->getSessionByHandle($handle);
    }

    /**
     * @return array<string, string>
     */
    public function getAuthHeaders(
        OAuthSession $session,
        string $method,
        string $url,
        ?string $dpopNonce = null,
        int $expiration = 30,
    ): array {
        $method = strtoupper($method);
        $dpopPrivateKey = CryptoKey::fromString($session->dpopPrivateKey);

        return [
            'DPoP' => Crypto::pdsDpopJwt(
                $method,
                $url,
                $session->accessToken,
                $dpopNonce,
                $dpopPrivateKey,
                $expiration,
            ),
            'Authorization' => $session->tokenType . ' ' . $session->accessToken,
        ];
    }

    public function updateDpopNonce(OAuthSession $session, string $dpopNonce): OAuthSession
    {
        // need to obtain a fresh session from the session manager to avoid overwriting any changes made to the session in the meantime
        $session = $this->sessionManager->getSessionByHandle($session->handle) ?? $session;
        $session = $session->withDpopNonce($dpopNonce);
        $this->sessionManager->saveSession($session);

        return $session;
    }

    public function removeSession(OAuthSession $session): void
    {
        $this->sessionManager->removeSession($session);
    }

    private function getAuthServerMetadataByDid(string $did): AuthServerMetadata
    {
        $authServer = $this->facade->getAuthServerByDid($did);

        return $this->facade->getAuthServerMetadata($authServer);
    }

    private function requestParAuthServer(
        AuthServerMetadata $authServerMetadata,
        CryptoKey $clientSecretJwk,
        CryptoKey $dpopJwk,
        ?string $loginHint,
    ): OAuthInitResult {
        $state = Crypto::randomString();
        $codeVerifier = Crypto::randomString(48);
        $codeChallenge = Crypto::s256CodeChallenge($codeVerifier);
        $codeChallengeMethod = 'S256';

        $body = [
            'response_type' => 'code',
            'code_challenge' => $codeChallenge,
            'code_challenge_method' => $codeChallengeMethod,
            'state' => $state,
            'redirect_uri' => $this->redirectUri(),
            'scope' => $this->metadata->scope,
        ];

        if ($loginHint !== null) {
            $body['login_hint'] = $loginHint;
        }

        $response = $this->requestAuthServer(
            authServerMetadata: $authServerMetadata,
            clientSecretJwk: $clientSecretJwk,
            dpopJwk: $dpopJwk,
            uri: $authServerMetadata->pushedAuthorizationRequestEndpoint,
            dpopNonce: null,
            body: $body,
            expiration: $this->initSessionTtl,
        );

        return new OAuthInitResult(
            $state,
            $codeVerifier,
            $response,
        );
    }

    /**
     * @param array<string, mixed> $body
     */
    private function requestAuthServer(
        AuthServerMetadata $authServerMetadata,
        CryptoKey $clientSecretJwk,
        CryptoKey $dpopJwk,
        string $uri,
        ?string $dpopNonce,
        array $body,
        int $expiration = 30,
    ): ResponseInterface {
        $clientAssertion = Crypto::clientAssertionJwt(
            $this->metadata->clientId,
            $authServerMetadata->issuer,
            $clientSecretJwk,
            $expiration,
        );

        $body['client_id'] = $this->metadata->clientId;
        $body['client_assertion'] = $clientAssertion;
        $body['client_assertion_type'] = 'urn:ietf:params:oauth:client-assertion-type:jwt-bearer';

        $dpopHeader = Crypto::authServerDpopJwt(
            'POST',
            $uri,
            $dpopNonce,
            $dpopJwk,
            $expiration,
        );

        $request = new Request(
            'POST',
            $uri,
            [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'DPoP' => $dpopHeader,
            ],
            http_build_query($body),
        );

        return $this->sendRequestWithRetry($request, $dpopJwk, $expiration);
    }

    private function sendRequestWithRetry(Request $request, CryptoKey $dpopJwk, int $expiration = 30): ResponseInterface
    {
        try {
            $response = $this->client->sendRequest($request);

            if ($response->getStatusCode() >= 400) {
                throw new BadResponseException(
                    'Bad response from the auth server.',
                    $request,
                    $response,
                );
            }
        } catch (ATProtoException|BadResponseException $e) {
            $response = $e->getResponse();

            if ($response === null) {
                throw new OAuthException(
                    'No response received from the auth server.',
                    previous: $e,
                );
            }

            $dpopNonce = $this->extractDpopNonce($response);
            $request = $request->withHeader('DPoP', Crypto::authServerDpopJwt(
                'POST',
                (string) $request->getUri(),
                $dpopNonce,
                $dpopJwk,
                $expiration,
            ));

            return $this->client->sendRequest($request);
        }

        return $response;
    }

    private function redirectUri(): string
    {
        return $this->metadata->redirectUris[0];
    }

    public function extractDpopNonce(ResponseInterface $response): ?string
    {
        return $response->getHeaderLine('DPoP-Nonce') ?: null;
    }
}
