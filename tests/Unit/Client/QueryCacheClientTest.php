<?php

declare(strict_types=1);

namespace Tests\Unit\Client;

use Aazsamir\Libphpsky\Client\QueryCacheClient;
use GuzzleHttp\Psr7\Response;
use Tests\Unit\Client\Stub\CachePoolStub;
use Tests\Unit\Client\Stub\ClientStub;
use Tests\Unit\TestCase;

/**
 * @internal
 */
final class QueryCacheClientTest extends TestCase
{
    use CreateRequestTrait;

    private ClientStub $mocked;
    private QueryCacheClient $client;
    private CachePoolStub $cache;

    protected function setUp(): void
    {
        $this->mocked = new ClientStub();
        $this->cache = new CachePoolStub();
        $this->client = new QueryCacheClient($this->mocked, $this->cache);
    }

    public function testSuccess(): void
    {
        $response = $this->client->sendRequest($this->createRequest());
        self::assertEquals(200, $response->getStatusCode());

        self::assertCount(1, $this->cache->cache);
    }

    public function testClientError(): void
    {
        $response = $this->client->sendRequest($this->createRequest());
        $this->mocked->responses = [new Response(400)];
        self::assertEquals(200, $response->getStatusCode());

        self::assertCount(1, $this->cache->cache);
    }

    public function testUnauthorized(): void
    {
        $this->mocked->responses = [new Response(401)];
        $this->client->sendRequest($this->createRequest());

        self::assertCount(0, $this->cache->cache);
    }

    public function testServerError(): void
    {
        $this->mocked->responses = [new Response(500)];
        $this->client->sendRequest($this->createRequest());

        self::assertCount(0, $this->cache->cache);
    }

    public function testCached(): void
    {
        $request = $this->createRequest();
        $this->client->sendRequest($request);
        $this->client->sendRequest($request);

        self::assertCount(1, $this->mocked->requests);
    }

    public function testPost(): void
    {
        $request = $this->createRequest(method: 'POST');
        $this->client->sendRequest($request);

        self::assertCount(0, $this->cache->cache);
    }
}
