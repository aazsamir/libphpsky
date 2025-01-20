<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Jetstream;

class WebSocketClientFactory implements WebSocketClientFactoryInterface
{
    /** @phpstan-ignore-next-line */
    public function __construct(
        private array $hosts = [
            'wss://jetstream1.us-east.bsky.network/subscribe',
            'wss://jetstream2.us-east.bsky.network/subscribe',
            'wss://jetstream1.us-west.bsky.network/subscribe',
            'wss://jetstream2.us-west.bsky.network/subscribe',
        ],
        private string $userAgent = 'Libphpsky/1.0',
    ) {}

    public function create(array $args): \WebSocket\Client
    {
        /** @var string $host */
        $host = $this->hosts[array_rand($this->hosts)];
        $query = http_build_query($args);

        if ($query) {
            $host .= '?' . $query;
        }

        $client = new \WebSocket\Client($host);
        $client
            ->addMiddleware(new \WebSocket\Middleware\CloseHandler())
            ->addHeader('User-Agent', $this->userAgent);

        return $client;
    }
}
