<?php

declare(strict_types=1);

namespace Tests\Unit\Client;

use Aazsamir\Libphpsky\ATProto\Client\AmphpClientAdapter;
use Amp\Http\Client\DelegateHttpClient;
use Amp\Http\Client\Request;
use Amp\Http\Client\Response;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Tests\Unit\TestCase;

/**
 * @internal
 */
final class AmphpClientAdapterTest extends TestCase
{
    public function testSendRequest(): void
    {
        $ampClient = $this->createMock(DelegateHttpClient::class);
        $ampClient->method('request')->willReturn(new Response(
            protocolVersion: '1.1',
            status: 200,
            reason: null,
            headers: [
                'content-type' => 'text/html',
            ],
            body: 'Hello, World!',
            request: new Request(uri: 'http://example.com', method: 'GET'),
        ));

        $adapter = new AmphpClientAdapter($ampClient);
        $request = new Psr7Request('GET', 'http://example.com');

        $response = $adapter->sendRequest($request);

        self::assertEquals(200, $response->getStatusCode());
        self::assertEquals('Hello, World!', (string) $response->getBody());
        self::assertEquals('text/html', $response->getHeaderLine('content-type'));
    }
}
