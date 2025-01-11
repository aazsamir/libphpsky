<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Client;

use Amp\Http\Client\HttpClient;
use Amp\Http\Client\Request;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class AmphpClientAdapter implements ATProtoClientInterface
{
    public function __construct(private HttpClient $client) {}

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        $amRequest = new Request(
            uri: $request->getUri(),
            method: $request->getMethod() ?: 'GET',
            body: (string) $request->getBody(),
        );

        foreach ($request->getHeaders() as $name => $values) {
            /** @var string $name */
            if (empty($name) || empty($values)) {
                continue;
            }

            $amRequest->addHeader($name, $values);
        }

        $amResponse = $this->client->request($amRequest);

        return new Response(
            status: $amResponse->getStatus(),
            headers: $amResponse->getHeaders(),
            body: (string) $amResponse->getBody(),
            version: $amResponse->getProtocolVersion(),
            reason: $amResponse->getReason(),
        );
    }
}
