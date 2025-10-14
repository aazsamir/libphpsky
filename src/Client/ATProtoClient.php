<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Client;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ATProtoClient implements ATProtoClientInterface
{
    public function __construct(
        private ClientInterface $client,
        private string $userAgent = ATProtoClientInterface::USER_AGENT,
    ) {}

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        $request = $request->withHeader('User-Agent', $this->userAgent);

        return $this->client->sendRequest($request);
    }
}
