<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\OAuth;

use Aazsamir\Libphpsky\OAuth\Session\OAuthSession;
use Aazsamir\Libphpsky\OAuth\Session\OAuthSessionInit;
use Psr\Http\Message\ResponseInterface;

interface ATProtoOAuthClient
{
    public function metadata(): ClientMetadata;

    public function initiateSession(string $handle): OAuthSessionInit;

    public function handleCallback(
        string $state,
        string $iss,
        string $code,
    ): OAuthSession;

    public function refreshToken(OAuthSession $session): OAuthSession;

    public function getSessionByHandle(string $handle): ?OAuthSession;

    /**
     * @return array<string, string>
     */
    public function getAuthHeaders(
        OAuthSession $session,
        string $method,
        string $url,
        ?string $dpopNonce = null,
        int $expiration = 30,
    ): array;

    public function updateDpopNonce(OAuthSession $session, string $dpopNonce): OAuthSession;

    public function removeSession(OAuthSession $session): void;

    public function extractDpopNonce(ResponseInterface $response): ?string;
}
