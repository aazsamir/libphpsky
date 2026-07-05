<?php

declare(strict_types=1);

namespace Tests\Stub;

use Aazsamir\Libphpsky\Client\ATProtoClientInterface;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @internal
 */
class ATProtoClientStub implements ATProtoClientInterface
{
    public RequestInterface $gotRequest;
    public ResponseInterface $response;
    /**
     * @var RequestInterface[]
     */
    public array $gotRequests = [];
    /**
     * @var ResponseInterface[]
     */
    public array $responses = [];
    public int $responseIndex = 0;

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        $this->gotRequest = $request;
        $this->gotRequests[] = $request;

        if ($this->responses === []) {
            return $this->response;
        }

        if ($this->responseIndex >= \count($this->responses)) {
            $requestedUri = (string) $request->getUri();

            throw new \RuntimeException('No more responses available in the stub. Requested ' . $requestedUri);
        }

        $response = $this->responses[$this->responseIndex];
        $this->responseIndex++;

        return $response;
    }

    public function setResponse(mixed $body, int $status = 200, array $headers = []): void
    {
        $this->response = self::wrap($body, $status, $headers);
    }

    public function addResponse(mixed $body, int $status = 200, array $headers = []): void
    {
        $this->responses[] = self::wrap($body, $status, $headers);
    }

    public static function wrap(mixed $body, int $status = 200, array $headers = []): ResponseInterface
    {
        if (\is_object($body) && method_exists($body, 'toArray')) {
            $body = $body->toArray();
        }

        return new Response(
            status: $status,
            headers: $headers,
            body: json_encode($body),
        );
    }
}
