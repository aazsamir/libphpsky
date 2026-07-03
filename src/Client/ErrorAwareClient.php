<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Client;

use GuzzleHttp\Exception\BadResponseException;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

readonly class ErrorAwareClient implements ATProtoClientInterface
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

        try {
            $response = $this->decorated->sendRequest($request);
        } catch (BadResponseException $e) {
            $response = $e->getResponse();
        }

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
                } elseif (isset($body['error_description']) && \is_string($body['error_description'])) {
                    $message = $body['error_description'];
                }
            }

            if ($response->getStatusCode() === 401) {
                throw new AuthException(
                    error: $error,
                    message: $message,
                    response: $response,
                    code: $response->getStatusCode(),
                    host: $request->getUri()->getHost() ?: null,
                    endpoint: $request->getUri()->getPath() ?: null,
                    query: $request->getUri()->getQuery() ?: null
                );
            }

            if ($query) {
                throw new QueryException(
                    error: $error,
                    message: $message,
                    response: $response,
                    code: $response->getStatusCode(),
                    host: $request->getUri()->getHost() ?: null,
                    endpoint: $request->getUri()->getPath() ?: null,
                    query: $request->getUri()->getQuery() ?: null
                );
            }
            throw new ProcedureException(
                error: $error,
                message: $message,
                response: $response,
                code: $response->getStatusCode(),
                host: $request->getUri()->getHost() ?: null,
                endpoint: $request->getUri()->getPath() ?: null,
                query: $request->getUri()->getQuery() ?: null
            );
        }

        return $response;
    }
}
