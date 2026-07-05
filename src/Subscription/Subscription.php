<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Subscription;

use Aazsamir\Libphpsky\Jetstream\WebSocketClientFactoryInterface;
use GuzzleHttp\Psr7\Uri;
use WebSocket\Message\Binary;

class Subscription
{
    private bool $stop = false;

    /**
     * @param array<string, mixed> $args
     * @param array<string, string> $headers
     */
    public function __construct(
        private readonly WebSocketClientFactoryInterface $webSocketClientFactory,
        private readonly MessageDecoder $messageDecoder,
        private readonly string $endpoint,
        private readonly string $lexiconId,
        private readonly array $args,
        private readonly array $headers,
        private readonly ?string $token = null,
        private readonly ?string $tokenType = 'Bearer',
    ) {}

    /**
     * @return \Generator<int, mixed>
     */
    public function next(): \Generator
    {
        $client = $this->getClient();

        while ($this->stop === false) {
            $message = $client->receive();

            if (!$message instanceof Binary) {
                continue;
            }

            $item = $this->messageDecoder->decode($message->getPayload(), $this->lexiconId);

            yield $item;
        }

        $this->stop = false;
        $client->close();
    }

    private function getClient(): \WebSocket\Client
    {
        $headers = $this->headers;

        if ($this->token !== null) {
            $headers['Authorization'] = $this->tokenType . ' ' . $this->token;
        }

        return $this->webSocketClientFactory->create(
            $this->args,
            $this->endpointWithLexicon(),
            $headers,
        );
    }

    private function endpointWithLexicon(): string
    {
        $uri = new Uri($this->endpoint);
        $uri = $uri
            ->withScheme('wss')
            ->withPath('/xrpc/' . $this->lexiconId);

        return (string) $uri;
    }

    public function stop(): void
    {
        $this->stop = true;
    }

    public function isStopped(): bool
    {
        return $this->stop;
    }
}
