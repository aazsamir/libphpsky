<?php

declare(strict_types=1);

namespace Tests\Unit\Jetstream;

use Aazsamir\Libphpsky\Jetstream\MessageAdapter;
use Aazsamir\Libphpsky\Jetstream\Model\CommitEvent;
use Aazsamir\Libphpsky\Jetstream\WssClient;
use Tests\Unit\Jetstream\Stub\MessageFaker;
use Tests\Unit\Jetstream\Stub\WebSocketClientFactoryStub;
use Tests\Unit\Jetstream\Stub\WebSocketClientStub;
use Tests\Unit\TestCase;
use WebSocket\Message\Text;

class WssClientTest extends TestCase
{
    private WebSocketClientStub $webSocketClientStub;
    private WebSocketClientFactoryStub $webSocketClientFactory;
    private MessageAdapter $messageAdapter;
    private WssClient $client;

    protected function setUp(): void
    {
        $this->webSocketClientStub = new WebSocketClientStub();
        $this->webSocketClientFactory = new WebSocketClientFactoryStub($this->webSocketClientStub);
        $this->messageAdapter = MessageAdapter::default();
        $this->webSocketClientStub->messages = [MessageFaker::commit()];
        $this->client = new WssClient(
            $this->webSocketClientFactory,
            $this->messageAdapter,
        );
    }

    public function testItReceiveMessage(): void
    {
        $this->webSocketClientStub->messages = [MessageFaker::commit()];
        $generator = $this->client->subscribe();
        $event = $generator->current();

        $this->assertInstanceOf(CommitEvent::class, $event);
    }

    public function testItIgnoresPing(): void
    {
        $this->webSocketClientStub->messages = [
            MessageFaker::ping(),
            MessageFaker::commit(),
        ];
        $generator = $this->client->subscribe();
        $event = $generator->current();

        $this->assertInstanceOf(CommitEvent::class, $event);
    }

    public function testItStops(): void
    {
        $generator = $this->client->subscribe();
        $generator->current();
        $this->client->stop();
        $generator->next();

        $this->assertTrue($this->webSocketClientStub->closed);
    }

    public function testArgsArePassedToFactory(): void
    {
        $this->client->subscribe(
            wantedCollections: ['foo', 'bar'],
            wantedDids: ['baz'],
            maxMessageSizeBytes: 12345,
            cursor: 'cursor123',
            compress: true,
        )->current();

        $args = $this->webSocketClientFactory->args;

        $this->assertSame(
            [
                'wantedCollections' => ['foo', 'bar'],
                'wantedDids' => ['baz'],
                'maxMessageSizeBytes' => 12345,
                'cursor' => 'cursor123',
                'compress' => true,
            ],
            $args,
        );
    }
}
