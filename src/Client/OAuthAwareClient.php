<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Client;

use Aazsamir\Libphpsky\Client\OAuth\HandleProvider;
use Aazsamir\Libphpsky\Client\OAuth\OAuthCallbackNeeded;
use Aazsamir\Libphpsky\OAuth\ATProtoOAuthClient;
use Aazsamir\Libphpsky\OAuth\Session\OAuthSession;
use GuzzleHttp\Exception\BadResponseException;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

readonly class OAuthAwareClient implements ATProtoClientInterface
{
    public function __construct(
        private ClientInterface $decorated,
        private ATProtoOAuthClient $oauthClient,
        private HandleProvider $handleProvider,
    ) {}

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        $uri = $request->getUri()->getPath();
        $uri = strtolower($uri);

        if (str_contains($uri, 'session')) {
            return $this->decorated->sendRequest($request);
        }

        if ($request->hasHeader('Authorization')) {
            return $this->decorated->sendRequest($request);
        }

        $handle = $this->handleProvider->provide();

        if (empty($handle)) {
            return $this->decorated->sendRequest($request);
        }

        $oauthClient = $this->oauthClient;
        $session = $oauthClient->getSessionByHandle($handle);

        if ($session === null) {
            $init = $oauthClient->initiateSession($handle);

            throw new OAuthCallbackNeeded(
                message: 'OAuth callback needed.',
                sessionInit: $init,
            );
        }

        $response = $this->sendRequestWithSession(
            $request,
            $session,
            $oauthClient,
        );
        // @todo: this is probably wrong with caching, and should be updated only on dpopNonce bounce?
        $dpopNonce = $oauthClient->extractDpopNonce($response);

        if ($dpopNonce !== null) {
            $oauthClient->updateDpopNonce($session, $dpopNonce);
        }

        return $response;
    }

    public function getOAuthClient(): ATProtoOAuthClient
    {
        return $this->oauthClient;
    }

    private function sendRequestWithSession(
        RequestInterface $request,
        OAuthSession $session,
        ATProtoOAuthClient $oauthClient,
    ): ResponseInterface {
        $uri = (string) $request->getUri()->withQuery('');
        $authHeaders = $oauthClient->getAuthHeaders(
            $session,
            $request->getMethod(),
            $uri,
            $session->dpopNonce,
        );

        foreach ($authHeaders as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        try {
            $response = $this->decorated->sendRequest($request);

            if ($response->getStatusCode() >= 400) {
                throw new ATProtoException(
                    error: 'Bad response from the server.',
                    message: 'Bad response from the server.',
                    response: $response,
                );
            }

            return $response;
        } catch (ATProtoException|BadResponseException $e) {
            $response = $e->getResponse();

            if ($response === null) {
                throw new OAuthException(
                    message: 'No response received from the server.',
                    previous: $e,
                );
            }

            $dpopNonce = $oauthClient->extractDpopNonce($response);
            // url must be without query params, otherwise the signature will be invalid
            $url = (string) $request->getUri()->withQuery('');
            $authHeaders = $oauthClient->getAuthHeaders(
                $session,
                $request->getMethod(),
                $url,
                $dpopNonce,
            );

            foreach ($authHeaders as $name => $value) {
                $request = $request->withHeader($name, $value);
            }

            try {
                return $this->decorated->sendRequest($request);
            } catch (\Throwable $e) {
                // we remove session on any error
                $oauthClient->removeSession($session);
                throw $e;
            }
        }
    }
}
