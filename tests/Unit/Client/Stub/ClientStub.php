<?php

declare(strict_types=1);

namespace Tests\Unit\Client\Stub;

use Aazsamir\Libphpsky\Client\ATProtoClientInterface;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ClientStub implements ATProtoClientInterface
{
    public int $requestCount = 0;
    /**
     * @var RequestInterface[]
     */
    public array $requests = [];

    public function __construct(
        /**
         * @var ResponseInterface[]
         */
        public array $responses = [],
    ) {}

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        $this->requests[] = $request;
        $response = $this->responses[$this->requestCount] ?? new Response();
        $this->requestCount++;

        return $response;
    }
}
