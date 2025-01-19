<?php

declare(strict_types=1);

namespace Tests\Model\Stub;

use Aazsamir\Libphpsky\Client\ATProtoClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ATProtoClientStub implements ATProtoClientInterface
{
    public RequestInterface $gotRequest;
    public ResponseInterface $response;

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        $this->gotRequest = $request;

        return $this->response;
    }
}