<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Client;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ErrorAwareClient implements ATProtoClientInterface
{
    public function __construct(
        private ClientInterface $decorated,
    ) {}

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        if ($request->getMethod() === 'GET') {
            $query = true;
        } else {
            $query = false;
        }

        $response = $this->decorated->sendRequest($request);

        if ($response->getStatusCode() >= 400) {
            $body = json_decode($response->getBody()->getContents(), true);
            $error = 'undefined';
            $message = $response->getReasonPhrase();

            if (\is_array($body)) {
                if (isset($body['error']) && \is_string($body['error'])) {
                    $error = $body['error'];
                }

                if (isset($body['message']) && \is_string($body['message'])) {
                    $message = $body['message'];
                }
            }

            if ($response->getStatusCode() === 401) {
                throw new AuthException($error, $message, $response->getStatusCode());
            }

            if ($query) {
                throw new QueryException($error, $message, $response->getStatusCode());
            } else {
                throw new ProcedureException($error, $message, $response->getStatusCode());
            }
        }

        return $response;
    }
}
