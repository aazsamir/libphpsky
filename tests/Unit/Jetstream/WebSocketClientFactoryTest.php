<?php

declare(strict_types=1);

namespace Tests\Unit\Jetstream;

use Aazsamir\Libphpsky\Client\ATProtoClientInterface;
use Aazsamir\Libphpsky\Jetstream\WebSocketClientFactory;
use Phrity\Net\Uri;
use Tests\Unit\TestCase;

/**
 * @internal
 */
class WebSocketClientFactoryTest extends TestCase
{
    private WebSocketClientFactory $factory;

    protected function setUp(): void
    {
        $this->factory = new WebSocketClientFactory(
            [
                'wss://example.com/subscribe',
            ]
        );
    }

    public function testClientCreationWithoutArgs(): void
    {
        $client = $this->factory->create([]);
        /** @var Uri */
        $uri = $this->getPrivateProperty($client, 'socketUri');

        self::assertEquals('wss', $uri->getScheme());
        self::assertEquals('example.com', $uri->getHost());
        self::assertEquals('/subscribe', $uri->getPath());
    }

    public function testClientCreationWithArgs(): void
    {
        $client = $this->factory->create([
            'abc' => '123',
            'def' => ['456', '789'],
        ]);
        /** @var Uri */
        $uri = $this->getPrivateProperty($client, 'socketUri');

        self::assertEquals('abc=123&def=456&def=789', $uri->getQuery());
    }

    public function testUserAgentIsSet(): void
    {
        $client = $this->factory->create([]);
        /** @var array */
        $headers = $this->getPrivateProperty($client, 'headers');

        self::assertArrayHasKey('User-Agent', $headers);
        self::assertEquals(ATProtoClientInterface::USER_AGENT, $headers['User-Agent']);
    }
}
