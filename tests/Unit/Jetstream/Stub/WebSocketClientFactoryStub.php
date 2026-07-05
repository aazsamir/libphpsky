<?php

declare(strict_types=1);

namespace Tests\Unit\Jetstream\Stub;

use Aazsamir\Libphpsky\Jetstream\WebSocketClientFactoryInterface;
use WebSocket\Client;

/**
 * @internal
 */
class WebSocketClientFactoryStub implements WebSocketClientFactoryInterface
{
    public array $args;

    public function __construct(
        public Client $client,
    ) {}

    public function create(array $args, ?string $host = null, array $headers = []): Client
    {
        $this->args = $args;

        return $this->client;
    }
}
