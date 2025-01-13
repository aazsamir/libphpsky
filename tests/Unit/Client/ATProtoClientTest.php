<?php

declare(strict_types=1);

namespace Tests\Unit\Client;

use Aazsamir\Libphpsky\ATProto\Client\ATProtoClient;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Client\ClientInterface;
use Tests\Unit\TestCase;

/**
 * @internal
 */
final class ATProtoClientTest extends TestCase
{
    public function testSendRequest(): void
    {
        $client = $this->createMock(ClientInterface::class);
        $client->method('sendRequest')->willReturn(new Response());

        $protoClient = new ATProtoClient($client);
        $response = $protoClient->sendRequest(new Request('GET', 'http://example.com'));

        self::assertEquals(200, $response->getStatusCode());
    }
}
