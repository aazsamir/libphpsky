<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Client;

use Amp\Http\Client\DelegateHttpClient;
use Amp\Http\Client\Request;
use Amp\NullCancellation;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class AmphpClientAdapter implements ATProtoClientInterface
{
    public function __construct(private DelegateHttpClient $client) {}

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

        $amResponse = $this->client->request($amRequest, new NullCancellation());

        return new Response(
            status: $amResponse->getStatus(),
            headers: $amResponse->getHeaders(),
            body: (string) $amResponse->getBody(),
            version: $amResponse->getProtocolVersion(),
            reason: $amResponse->getReason(),
        );
    }
}
