<?php

declare(strict_types=1);

namespace Tests\Model;

use Aazsamir\Libphpsky\Model\Meta\ATProtoMetaClient;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase as FrameworkTestCase;
use Tests\Model\Stub\ATProtoClientStub;

abstract class TestCase extends FrameworkTestCase
{
    protected ATProtoMetaClient $client;
    protected ATProtoClientStub $stub;

    protected function setUp(): void
    {
        $this->stub = new ATProtoClientStub();
        $this->client = new ATProtoMetaClient($this->stub);
    }

    protected function mockResponse(array $response): void
    {
        $response = \json_encode($response);
        $response = new Response(200, [], $response);
        $this->stub->response = $response;
    }

    protected function jsonres(string $json): array
    {
        $json = trim($json);
        $json = \preg_replace('/\s+/', ' ', $json);
        return json_decode((string) $json, true);
    }

    protected function fileres(string $file): array
    {
        if (!file_exists($file)) {
            throw new \RuntimeException('File not found: ' . $file);
        }

        return json_decode(file_get_contents($file), true);
    }
}
