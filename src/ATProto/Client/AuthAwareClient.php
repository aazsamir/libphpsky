<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Client;

use Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\CreateSession\CreateSession;
use Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\RefreshSession\RefreshSession;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class AuthAwareClient implements ATProtoClientInterface
{
    public function __construct(
        private ClientInterface $decorated,
        private AuthConfig $authConfig,
        private SessionStore $sessionStore,
    ) {}

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        $uri = (string) $request->getUri()->getPath();
        $uri = \strtolower($uri);

        // ugly, but to prevent infinite loop
        if (\str_contains($uri, 'session')) {
            return $this->decorated->sendRequest($request);
        }

        if ($request->hasHeader('Authorization')) {
            return $this->decorated->sendRequest($request);
        }

        if ($this->authConfig->login() === null || $this->authConfig->password() === null) {
            return $this->decorated->sendRequest($request);
        }

        $session = $this->getSession();

        return $this->sendRequestWithSession($request, $session);
    }

    private function getSession(): Session
    {
        $session = $this->sessionStore->retrieve($this->authConfig);

        if ($session === null) {
            $createSession = CreateSession::default();
            $input = \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\CreateSession\Input::new(
                identifier: $this->authConfig->login(),
                password: $this->authConfig->password(),
                authFactorToken: $this->authConfig->authFactorToken(),
                allowTakendown: $this->authConfig->allowTakendown(),
            );
    
            $session = $createSession->procedure($input);
            $session = new Session($session->accessJwt, $session->refreshJwt);

            $this->sessionStore->store($this->authConfig, $session);
        }

        return $session;
    }

    private function sendRequestWithSession(RequestInterface $request, Session $session): ResponseInterface
    {
        $request = $this->withSession($request, $session);

        try {
            $response = $this->decorated->sendRequest($request);

            // if ErrorAwareClient is not used, this will be needed
            if ($response->getStatusCode() === 401) {
                throw new AuthException('Unauthorized', 'Unauthorized', 401);
            }
        } catch (AuthException $e) {
            $refreshSession = RefreshSession::default();
            $response = $refreshSession->withAuth($session->getRefreshToken())->procedure();

            $session = new Session($response->accessJwt, $response->refreshJwt);
            $this->sessionStore->store($this->authConfig, $session);

            $request = $this->withSession($request, $session);
            $response = $this->decorated->sendRequest($request);

            if ($response->getStatusCode() === 401) {
                throw new AuthException('Unauthorized', 'Unauthorized', 401, $e);
            }
        }

        return $response;
    }

    private function withSession(RequestInterface $request, Session $session): RequestInterface
    {
        return $request->withHeader('Authorization', 'Bearer ' . $session->getAccessToken());
    }
}
