<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Client;

use Aazsamir\Libphpsky\Client\Session\Session;
use Aazsamir\Libphpsky\Client\Session\SessionStore;
use Aazsamir\Libphpsky\Generator\Prefab\TypeResolver;
use Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateSession\CreateSession;
use Aazsamir\Libphpsky\Model\Com\Atproto\Server\RefreshSession\RefreshSession;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class AuthAwareClient implements ATProtoClientInterface
{
    public function __construct(
        private readonly ClientInterface $decorated,
        private readonly AuthConfig $authConfig,
        private readonly SessionStore $sessionStore,
        private ?CreateSession $createSession = null,
        private ?RefreshSession $refreshSession = null,
    ) {}

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        $uri = $request->getUri()->getPath();
        $uri = strtolower($uri);

        // ugly, but to prevent infinite loop
        if (str_contains($uri, 'session')) {
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
        if ($this->authConfig->login() === null || $this->authConfig->password() === null) {
            throw new AuthException('ClientError', 'Login and password must be set');
        }

        $session = $this->sessionStore->retrieve($this->authConfig);

        if ($session === null) {
            $input = \Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateSession\Input::new(
                identifier: $this->authConfig->login(),
                password: $this->authConfig->password(),
                authFactorToken: $this->authConfig->authFactorToken(),
                allowTakendown: $this->authConfig->allowTakendown(),
            );

            $session = $this->createSession()->procedure($input);
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
            $response = $this->refreshSession()->withAuth($session->getRefreshToken())->procedure();

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

    private function createSession(): CreateSession
    {
        if ($this->createSession === null) {
            $this->createSession = new CreateSession($this->atprotoClient(), TypeResolver::default());
        }

        return $this->createSession;
    }

    private function refreshSession(): RefreshSession
    {
        if ($this->refreshSession === null) {
            $this->refreshSession = new RefreshSession($this->atprotoClient(), TypeResolver::default());
        }

        return $this->refreshSession;
    }

    private function atprotoClient(): ATProtoClientInterface
    {
        if ($this->decorated instanceof ATProtoClientInterface) {
            return $this->decorated;
        }

        return new ATProtoClient($this->decorated);
    }

    private function withSession(RequestInterface $request, Session $session): RequestInterface
    {
        return $request->withHeader('Authorization', 'Bearer ' . $session->getAccessToken());
    }
}
