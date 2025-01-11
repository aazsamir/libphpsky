<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Client;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ATProtoClient implements ATProtoClientInterface
{
    public function __construct(
        private ClientInterface $client,
    ) {}

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        return $this->client->sendRequest($request);
    }
}
