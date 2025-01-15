<?php

declare(strict_types=1);

namespace Tests\Unit\Client;

use Aazsamir\Libphpsky\Client\AuthException;
use Aazsamir\Libphpsky\Client\ErrorAwareClient;
use Aazsamir\Libphpsky\Client\ProcedureException;
use Aazsamir\Libphpsky\Client\QueryException;
use GuzzleHttp\Psr7\Response;
use Tests\Unit\Client\Stub\ClientStub;
use Tests\Unit\TestCase;

/**
 * @internal
 */
final class ErrorAwareClientTest extends TestCase
{
    use CreateRequestTrait;

    private ClientStub $mocked;
    private ErrorAwareClient $client;

    protected function setUp(): void
    {
        $this->mocked = new ClientStub();
        $this->client = new ErrorAwareClient($this->mocked);
    }

    public function testSuccess(): void
    {
        $response = $this->client->sendRequest($this->createRequest());

        self::assertEquals(200, $response->getStatusCode());
    }

    public function testQueryException(): void
    {
        $this->mocked->responses = [
            new Response(
                status: 400,
                body: json_encode([
                    'error' => 'error',
                    'message' => 'message',
                ])
            ),
        ];

        $this->expectException(QueryException::class);
        $this->expectExceptionMessage('error: message');
        $this->client->sendRequest($this->createRequest(method: 'GET'));
    }

    public function testProcedureException(): void
    {
        $this->mocked->responses = [
            new Response(
                status: 400,
                body: json_encode([
                    'error' => 'error',
                    'message' => 'message',
                ])
            ),
        ];

        $this->expectException(ProcedureException::class);
        $this->expectExceptionMessage('error: message');
        $this->client->sendRequest($this->createRequest(method: 'POST'));
    }

    public function testAuthException(): void
    {
        $this->mocked->responses = [
            new Response(
                status: 401,
                body: json_encode([
                    'error' => 'error',
                    'message' => 'message',
                ])
            ),
        ];

        $this->expectException(AuthException::class);
        $this->expectExceptionMessage('error: message');
        $this->client->sendRequest($this->createRequest());
    }
}
