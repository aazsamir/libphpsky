<?php

declare(strict_types=1);

namespace Tests\Unit\Client;

trait CreateRequestTrait
{
    private function createRequest(
        string $method = 'GET',
        string $uri = 'http://example.com',
        array $headers = [],
        string $body = '',
    ): \GuzzleHttp\Psr7\Request {
        return new \GuzzleHttp\Psr7\Request(
            method: $method,
            uri: $uri,
            headers: $headers,
            body: $body
        );
    }
}
